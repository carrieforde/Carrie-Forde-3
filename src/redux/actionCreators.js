import axios from 'axios';
import {
  ROOT_URL,
  FETCH_POSTS,
  FETCH_POST,
  MORE_POSTS,
  FETCH_TAXONOMIES
} from './actions';

export function fetchPosts(posts) {
  return { type: FETCH_POSTS, payload: posts };
}

export function fetchPost(post) {
  return { type: FETCH_POST, payload: post[0] };
}

export function morePosts(posts) {
  return { type: MORE_POSTS, payload: posts };
}

export function fetchTaxonomies(taxonomies) {
  return { type: FETCH_TAXONOMIES, payload: taxonomies };
}

export function getAPIData(endpoint, cb) {
  return dispatch => {
    axios
      .get(`${ROOT_URL}/wp-json/${endpoint}`)
      .then(response => {
        dispatch(cb(response.data));
      })
      .catch(error => {
        console.error('axios error', error);
      });
  };
}

export function getPostFromState(posts, slug) {
  const post = posts.filter(post => post.slug === slug);
  return fetchPost(post);
}
