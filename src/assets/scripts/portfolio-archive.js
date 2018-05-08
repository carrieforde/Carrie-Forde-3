import Utilities from './utilities.js';

class PortfolioArchive {
  constructor() {
    this.utils = new Utilities();

    this.utils.getPostData(
      'GET',
      'https://carrieforde.com/wp-json/carrie-forde/v1/rest-portfolio',
      this.renderPosts
    );
  }

  renderPosts(posts) {
    const postContainer = document.getElementById('portfolio-posts');

    let portPosts = '';

    posts.forEach(post => {
      let portPost = `
        <article id="post-${
          post.id
        }" class="card card--portfolio portfolio-card">
          <div class="card__inner-wrap">
            <header class="entry-header card__header">
              <a href="${post.url}">
                <h2 class="entry-title card__title">${post.title}</h2>
                <div class="card__technologies">${post.terms}</div>
              </a>
            </header>

            <div class="entry-content card__content">
                <div class="post-thumbnail card__image">
                  <a href="${post.url}">
                    ${post.thumbnail}
                  </a>
                </div>
            </div>
          </div>
        </article>`;

      portPosts += portPost;
    });

    postContainer.innerHTML = portPosts;
  }
}

export default PortfolioArchive;
