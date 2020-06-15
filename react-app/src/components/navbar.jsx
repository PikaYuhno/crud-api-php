import React, { Component } from 'react';
import {Navbar, Nav} from 'react-bootstrap';
class NavBar extends Component {
    state = {  }
    render() { 
        return ( 
        <Navbar bg="light" expand="lg">
            <Navbar.Brand href="#home">React-Bootstrap</Navbar.Brand>
            <Navbar.Toggle aria-controls="basic-navbar-nav" />
            <Navbar.Collapse id="basic-navbar-nav">
                <Nav className="mr-auto" as="ul" >
                    <Nav.Link href="/" >Home</Nav.Link>
                    <Nav.Link href="/library/view"> Libraries</Nav.Link> 
                    <Nav.Link href="/author/view"> Authors</Nav.Link> 
                    <Nav.Link href="">Books</Nav.Link> 
                    <Nav.Link href="">Users</Nav.Link> 
                </Nav>
            </Navbar.Collapse>
        </Navbar>
         );
    }
}
 
export default NavBar;