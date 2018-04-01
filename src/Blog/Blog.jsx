import React, { Component } from 'react';
import { connect } from 'react-redux';
import { getAPIData, fetchPosts } from '../redux/actionCreators';

class Blog extends Component {
  componentDidMount() {
    if (!this.props.isFetched) {
      this.props.getPosts();
    }
  }

  render() {
    return <h1>Hello</h1>;
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
