import React, { Component } from 'react';
import { connect } from 'react-redux';
import { getAPIData, fetchPosts } from '../redux/actionCreators';
import PostCard from './PostCard';
import Masonry from 'masonry-layout';

class Blog extends Component {
  componentDidMount() {
    if (!this.props.isFetched) {
      this.props.getPosts();
    }
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

  render() {
    let posts;

    if (this.props.isFetched) {
      posts = this.props.posts.map((post, index) => (
        <PostCard key={post.id} index={index} {...post} />
      ));
    } else {
      posts = <h2>Loading...</h2>;
    }
    return <div className="blog-grid masonry">{posts}</div>;
  }
}

const mapStateToProps = state => {
  return {
    posts: state.posts,
    isFetched: state.isFetched
  };
};

const mapDispatchToProps = dispatch => ({
  getPosts() {
    dispatch(
      getAPIData(
        'http://carrieforde.test/wp-json/carrie-forde/v1/home-endpoint',
        fetchPosts
      )
    );
  }
});

export default connect(mapStateToProps, mapDispatchToProps)(Blog);
