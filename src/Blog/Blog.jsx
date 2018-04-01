import React, { Component } from 'react';
import { connect } from 'react-redux';
import { getAPIData, fetchPosts, morePosts } from '../redux/actionCreators';
import PostCard from './PostCard';
import Masonry from 'masonry-layout';

class Blog extends Component {
  componentDidMount() {
    if (!this.props.isFetched) {
      this.props.getPosts(`home-endpoint`, fetchPosts);
    }

    document.addEventListener('click', event => {
      const target = event.target;

      if (target.getAttribute('id') === 'loadMore') {
        this.getMorePosts();
      }
    });
  }

  componentDidUpdate() {
    // Init masonry.
    setTimeout(() => {
      const masonry = new Masonry(document.querySelector('.masonry'), {
        itemSelector: '.card',
        columnWidth: '.alcatraz-col--4',
        percentPosition: true
      });
    }, 500);
  }

  getMorePosts() {
    this.props.getPosts(
      `home-endpoint?offset=${this.props.posts.length}`,
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
    dispatch(
      getAPIData(
        `http://carrieforde.test/wp-json/carrie-forde/v1/${endpoint}`,
        cb
      )
    );
  }
});

export default connect(mapStateToProps, mapDispatchToProps)(Blog);
