import React from 'react';
import './App.css';
import {
  BrowserRouter as Router,
  Route,
  Switch,
} from "react-router-dom";
import ViewLibrary from './components/library/view-library';
import UpdateLibrary from './components/library/update-library';
import AddLibrary from './components/library/add-library';

import ViewAuthor from './components/author/view-author';
import UpdateAuthor from './components/author/update-author';
import AddAuthor from './components/author/add-author';
import Home from './components/home';

function App() {
  return (
    <Router>
        <Switch>
          <Route path="/" exact component={Home} />
          <Route path="/library/view" exact component={ViewLibrary} />
          <Route path="/library/update/:id" exact component={UpdateLibrary} />
          <Route path="/library/add" exact component={AddLibrary} />
          <Route path="/author/view" exact component={ViewAuthor} />
          <Route path="/author/update/:id" exact component={UpdateAuthor} />
          <Route path="/author/add" exact component={AddAuthor} />
        </Switch>
      </Router>
  );
}

export default App;
