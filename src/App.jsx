import React from 'react';
import { render } from 'react-dom';
import Routes from './Routes';
import './assets/sass/main';

const App = () => <Routes />;

if (document.body.classList.contains('blog')) {
  render(<App />, document.getElementById('app'));
}

// import { Utilities } from 'utilities.js';
// import { PortfolioArchive } from 'portfolio-archive.js';
// import { BlogArchive } from './assets/scripts/blog-archive';

// // Load Portfolio Archive posts.
// if (document.body.classList.contains('post-type-archive-cf-portfolio')) {
//   new PortfolioArchive();
// }

// // Load Blog posts.
// if (document.body.classList.contains('blog')) {
//   new BlogArchive();
// }

/**
 * Toggles a class onto the main navigation to display the search.
 *
 * @param   {string}  toggle The toggle button.
 * @returns {boolean}        Whether class was applied.
 */
function toggleNavSearch(toggle) {
  const mainNavigation = toggle.closest('.main-navigation');

  if (!mainNavigation) {
    return false;
  }

  mainNavigation.classList.toggle('show-search');
  return true;
}

// Fire Events.
document.addEventListener('click', e => {
  const target = e.target.closest('.search-toggle');

  if (!target) {
    return false;
  }

  toggleNavSearch(target);
  return true;
});

// Deal with jQuery-dependent plugins.
(function($) {
  function initStickyNav() {
    const tabletPortrait = 600,
      $header = $('.site-header');

    let windowWidth = window.innerWidth;

    // Fire sticky navigation on tablet portrait+.
    if (tabletPortrait <= windowWidth) {
      $header.sticky({
        zIndex: 3
      });
    }

    // If the window is resized, or small to start, unstick the header.
    if (tabletPortrait > windowWidth) {
      $header.unstick();
    }
  }

  document.addEventListener('DOMContentLoaded', initStickyNav);
  window.addEventListener('resize', initStickyNav);
})(jQuery);
