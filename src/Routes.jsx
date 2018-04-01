import React from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';

const Routes = () => (
  <BrowserRouter>
    <Switch>
      <Route exact path="/blog" component={Blog} />
      <Route exact path="/portfolio" component={Portfolio} />
    </Switch>
  </BrowserRouter>
);

export default Routes;
