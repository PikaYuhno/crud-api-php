import React, { Component } from 'react';
import Navbar from './navbar';

class Home extends Component {
    state = {  }
    render() { 
        return ( 
            <React.Fragment>
                <Navbar />
                <h1>Home</h1>
            </React.Fragment>
         );
    }
}
 
export default Home;