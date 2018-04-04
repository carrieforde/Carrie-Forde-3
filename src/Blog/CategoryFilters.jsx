import React, { Component } from 'react';
import { connect } from 'react-redux';
import { getAPIData, fetchTaxonomies } from '../redux/actionCreators';
import Button from './Button';

class CategoryFilters extends Component {
  componentDidMount() {
    if (!this.props.taxonomies.length) {
      this.props.getTaxonomies(`carrie-forde/v1/taxonomies`, fetchTaxonomies);
    }
  }

  render() {
    const { taxonomies } = this.props;
    let filters;
    if (taxonomies.length) {
      const categories = taxonomies.filter(
        taxonomy => taxonomy.taxonomy === 'category'
      );

      filters = categories[0].terms.map(term => (
        <Button key={term.id} {...term} />
      ));
    }
    return <div className="category-filters">{filters}</div>;
  }
}

const mapStateToProps = state => {
  return {
    taxonomies: state.taxonomies
  };
};

const mapDispatchToProps = dispatch => ({
  getTaxonomies(endpoint, cb) {
    dispatch(getAPIData(endpoint, cb));
  }
});

export default connect(mapStateToProps, mapDispatchToProps)(CategoryFilters);
