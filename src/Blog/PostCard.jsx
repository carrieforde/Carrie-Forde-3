import React from 'react';
import { Link } from 'react-router-dom';
import PostCardSticky from './PostCardSticky';

const PostCard = props => {
  const { index, id, link, excerpt, slug, term, thumbnail, title } = props,
    postThumbnail = thumbnail ? thumbnail : term.term_image;

  if (index === 0) {
    return <PostCardSticky {...props} />;
  } else {
    return (
      <article id={`post-${id}`} className="card card--post alcatraz-col--4">
        <div className="card__inner-wrap">
          <div className="post-thumbnail card__image">
            <Link
              to={`/${slug}`}
              dangerouslySetInnerHTML={{ __html: postThumbnail }}
            />
            <span className={`category-badge background-${term.term_color}`}>
              <Link to={`/category/${term.term_name}`}>{term.term_name}</Link>
            </span>
          </div>

          <header className="entry-header card__header">
            <h2 className="entry-title card__title">
              <Link to={`/${slug}`}>{title}</Link>
            </h2>
          </header>

          <div
            className="entry-content card__content"
            dangerouslySetInnerHTML={{ __html: excerpt }}
          />
          <footer className="entry-footer card__footer">
            <Link
              to={`/${slug}`}
              className={`button button--text color-${term.term_color}`}
            >
              Read More
            </Link>
          </footer>
        </div>
      </article>
    );
  }
};

export default PostCard;
