import { FETCH_POSTS, FETCH_POST } from './actions';

// Define the default state.
const DEFAULT_STATE = {
  posts: [],
  post: null,
  isFetched: false
};

const fetchPosts = (state, action) =>
  Object.assign({}, state, { posts: action.payload, isFetched: true });

const fetchPost = (state, action) =>
  Object.assign({}, state, { post: action.payload });

const rootReducer = (state = DEFAULT_STATE, action) => {
  switch (action.type) {
    case FETCH_POSTS:
      return fetchPosts(state, action);
    case FETCH_POST:
      return fetchPost(state, action);
    default:
      return state;
  }
};

export default rootReducer;
