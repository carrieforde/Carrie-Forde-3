import React from 'react';

const Button = props => {
  const { term_color, name } = props;
  return (
    <button
      type="button"
      className={`button button--${term_color} category-filter`}
    >
      {name}
    </button>
  );
};

export default Button;
