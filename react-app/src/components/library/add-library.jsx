import React, { Component } from 'react';
import Navbar from '../navbar';

class AddLibrary extends Component {
    constructor() {
        super();
        this.state = {
        }
    }

    handleChange = (e) => {
       this.setState({[e.target.name]: e.target.value}); 
    }

    handleSubmit = async (e) => {
        e.preventDefault();
        let {lib_name, lib_location} = this.state;
        console.log(this.state);
        await fetch(`/api/library/create.php`, {
            method: 'POST',
            headers: {
              "Content-Type": "application/json"  
            },
            body: JSON.stringify({
                name: lib_name,
                location: lib_location
            }) 
        });
        this.props.history.push("/library/view");
    }
    render() { 
        return ( 
            <React.Fragment>
                <Navbar />
                <div className="container" style={{marginTop: 80 + "px"}}>
                    <h1>Add a Library</h1>
                    <form>
                        <div className="form-group">
                            <label htmlFor="lib-location-id">Location</label>
                            <input name="lib_location" type="text" className="form-control" onChange={this.handleChange} id="lib-location-id" placeholder="Enter Library" />
                        </div>
                        <div className="form-group">
                            <label htmlFor="lib-name-id">Name</label>
                            <input name="lib_name" type="text" className="form-control" onChange={this.handleChange} id="lib-name-id" placeholder="Enter Name" />
                        </div>
                        <button type="submit" onClick={this.handleSubmit} className="btn btn-primary">Submit</button>
                    </form>
                </div>
            </React.Fragment>
         );
    }
}
 
export default AddLibrary;