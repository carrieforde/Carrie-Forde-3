import React from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import { Provider } from 'react-redux';
import store from './redux/store';
import Blog from './Blog/Blog';

const Routes = () => (
  <BrowserRouter>
    <Provider store={store}>
      <Switch>
        <Route exact path="/blog" component={Blog} />
        {/* <Route exact path="/portfolio" component={Portfolio} /> */}
      </Switch>
    </Provider>
  </BrowserRouter>
);

export default Routes;
