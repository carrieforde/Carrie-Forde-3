(function() {

  'use strict';

  let postContainer = document.querySelector( '.posts' );

  function getPosts (...params) {

    let promise = new Promise((resolve, reject) => {

      const xhr = new XMLHttpRequest();

      xhr.onload = () => {

        let response;

        if (xhr.status === 200) {
          response = JSON.parse(xhr.response);

          if (response.error) {
            reject(`Sorry, there was an error.`);
          }

          resolve(response);
        }
      };

      xhr.onerror = () => reject(`Sorry, there was an error.`);

      xhr.open('GET', 'http://carrieforde.local/wp-json/wp/v2/posts' + params);
      xhr.send();
    });

    promise.then(
      result => {
        renderPosts(result);
      },
      error => {
        console.log(error);
      }
    )
  }

  function renderPosts ( posts ) {

    let articles = '<section class="posts">';

    posts.forEach(post => {

      let featuredImage = post._embedded['wp:featuredmedia'] !== undefined ? `<img src="${post._embedded['wp:featuredmedia'][0].media_details.sizes['card-image'].source_url}" >` : '',
          term = post._embedded['wp:term'][0][0],
          category = `<span class="category-badge background-razzmatazz"><a href="${term.link}" rel="${term.slug} ${term.taxonomy}">${term.name}</a></span>`,
          article = `
          <article id="${post.id}" class="card card--post alcatraz-col--4">
            <div class="card__inner-wrap">
              <div class="post-thumbnail card__image">
                <a href="${post.link}">
                  ${featuredImage}
                </a>
                ${category}
              </div>
  
              <header class="entry-header card__header">
                <h2 class="entry-title card__title"><a href="${post.link}">${post.title.rendered}</a></h2>
              </header>
  
              <div class="entry-content card__content">
                ${post.excerpt.rendered}
              </div>
  
              <footer class="entry-footer card__footer">
                <a href="${post.link}" class="button button--text color-razzmatazz">Read More</a>
              </footer>
            </div>
          </article>`;
  
      articles += article;
    });

    postContainer.innerHTML += articles + '</section>';
  }

  // function clearPosts () {
  //   postContainer.innerHTML = '';
  // }

  // document.addEventListener( 'DOMContentLoaded', getPosts('?per_page=3&_embed') );
})();
