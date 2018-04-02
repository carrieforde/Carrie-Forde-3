import React, { Component } from 'react';
import { connect } from 'react-redux';
import { getAPIData, fetchPosts, morePosts } from '../redux/actionCreators';
import PostCard from './PostCard';
import $ from 'jquery';

class Blog extends Component {
  componentDidMount() {
    if (!this.props.isFetched) {
      this.props.getPosts(`carrie-forde/v1/home-endpoint`, fetchPosts);
    }

    document.addEventListener('click', event => {
      const target = event.target;

      if (target.getAttribute('id') === 'loadMore') {
        this.getMorePosts();
      }
    });
  }

  componentDidUpdate(prevProps) {
    const { posts } = this.props,
      $grid = $('.masonry');

    if (prevProps.posts.length > 0) {
      $grid.masonry('destroy');

      setTimeout(() => {
        $grid.masonry({
          itemSelector: '.card',
          columnWidth: '.alcatraz-col--4',
          percentPosition: true
        });
      }, 500);
    }

    if (prevProps.posts.length === 0) {
      setTimeout(() => {
        $grid.masonry({
          itemSelector: '.card',
          columnWidth: '.alcatraz-col--4',
          percentPosition: true
        });
      }, 250);
    }
  }

  getMorePosts() {
    this.props.getPosts(
      `carrie-forde/v1/home-endpoint?offset=${this.props.posts.length}`,
      morePosts
    );
  }

  render() {
    let posts;

    if (this.props.isFetched) {
      posts = this.props.posts.map((post, index) => (
        <PostCard key={post.id} index={index} {...post} />
      ));
    } else {
      posts = <h2>Loading...</h2>;
    }
    return (
      <div className="page">
        <header className="page-header">
          <h1 className="page-title screen-reader-text">Blog</h1>
        </header>
        <div className="page-content blog-grid masonry">{posts}</div>
        <footer className="page-footer">
          <button id="loadMore" className="button">
            Load More Posts
          </button>
        </footer>
      </div>
    );
  }
}

const mapStateToProps = state => {
  return {
    posts: state.posts,
    isFetched: state.isFetched
  };
};

const mapDispatchToProps = dispatch => ({
  getPosts(endpoint, cb) {
    dispatch(getAPIData(endpoint, cb));
  }
});

export default connect(mapStateToProps, mapDispatchToProps)(Blog);
