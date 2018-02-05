const Masonry = require('masonry-layout');

import { Utilities } from 'utilities.js';

export class BlogArchive {

  constructor() {
    this.utils = new Utilities();
    this.totalPosts = 0;
    this.count = 0;
    this.masonry;

    this.utils.getPostData('GET', 'http://carrieforde.local/wp-json/carrie-forde/v1/home-endpoint', this.totalPostsCount.bind(this), 'per_page=-1');

    this.bindEvents();
  }

  totalPostsCount (posts) {

    return this.totalPosts = posts.length;
  }

  renderPosts (posts) {

    const postContainer = document.querySelector('.blog-grid'),
          fragment = document.createDocumentFragment(),
          loadMore = document.getElementById('loadMore');

    let articles = [];

    posts.forEach(post => {

      let article = document.createElement('article');

      article.classList.add('card');
      article.setAttribute('id', post.id);

      if (this.count === 0) {
        article.classList.add('card--horizontal', 'alcatraz-col--8');
      } else {
        article.classList.add('card--post', 'alcatraz-col--4');
      }

      let articleImage = post.thumbnail ? post.thumbnail : post.term.term_image,
          innerWrap = this.count !== 0 ? `<div class="card__inner-wrap">` : '',
          innerWrapClose = this.count !== 0 ? `</div>` : '',
          contentWrapper = this.count === 0 ? `<div class="card__content-wrap">` : '',
          contentWrapperClose = this.count === 0 ? `</div>` : '';

      article.innerHTML = `
          ${innerWrap}
            <div class="post-thumbnail card__image">
              <a href="${post.link}">
                ${articleImage}
              </a>
              <span class="category-badge background-${post.term.term_color}">
                <a href="${post.term.term_link}" rel="${post.term.term_slug} ${post.term.term_taxonomy}">${post.term.term_name}</a>
              </span>
            </div>
            ${contentWrapper}
            <header class="entry-header card__header">
              <h2 class="entry-title card__title"><a href="${post.link}">${post.title}</a></h2>
            </header>

            <div class="entry-content card__content">
              ${post.excerpt}
            </div>

            <footer class="entry-footer card__footer">
              <a href="${post.link}" class="button button--text color-${post.term.term_color}">Read More</a>
            </footer>
            ${contentWrapperClose}
          ${innerWrapClose}`;

      this.count++;
      fragment.appendChild(article);
      articles.push(article);
    });

    if (this.count === 8) {
      postContainer.appendChild(fragment);

      this.masonry = new Masonry(document.querySelector('.blog-grid'), {
        itemSelector: '.card',
        columnWidth: '.alcatraz-col--4',
        percentPosition: true,
      });

      setTimeout(() => {
        this.masonry.layout();
      }, 250);
    } else {
      postContainer.appendChild(fragment);
      this.masonry.appended(articles);

      setTimeout(() => {
        this.masonry.layout();
      }, 250);
    }

    if (!this.postsAvailable()) {
      loadMore.classList.add('is-hidden');
    }
  }

  loadMorePosts () {

    this.utils.getPostData('GET', 'http://carrieforde.local/wp-json/carrie-forde/v1/home-endpoint', this.renderPosts.bind(this), `offset=${this.count}`, `per_page=9`);
  }

  postsAvailable () {

    if (this.count >= this.totalPosts) {
      return false;
    }

    return true;
  }

  bindEvents () {

    document.addEventListener('DOMContentLoaded', () => {

      this.utils.getPostData('GET', 'http://carrieforde.local/wp-json/carrie-forde/v1/home-endpoint', this.renderPosts.bind(this), 'per_page=8');
    });

    document.addEventListener('click', event => {

      const target = event.target.closest('#loadMore');

      if (!target) {
        return false;
      }

      this.loadMorePosts();
    });
  }
}
