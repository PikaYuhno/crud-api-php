import React, { Component } from 'react';
import Navbar from '../navbar';

import dotenv from 'dotenv';
dotenv.config();
class UpdateLibrary extends Component {
    constructor(props) {
        super(props);
        this.state = {
            libraryItem: undefined
        }
    }

    async componentDidMount() {
        const promise = await fetch(`${process.env.FRONTENDIP}/api/library/read_one.php?id=${this.props.match.params.id}`);
        const json = await promise.json();
        this.setState({libraryItem: json});
    }

    handleChange = (e) => {
       this.setState({[e.target.name]: e.target.value}); 
    }

    handleSubmit = async (e) => {
        e.preventDefault();
        let {lib_name, lib_location} = this.state;
        console.log(this.state);
        await fetch(`${process.env.FRONTENDIP}/api/library/update.php?id=${this.props.match.params.id}`, {
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
        if(!this.state.libraryItem) return <h1>404 Not Found</h1>
        return ( 
            <React.Fragment>
                <Navbar />
                <div className="container" style={{marginTop: 80 + "px"}}>
                    <h1>Update a Library</h1>
                    <form>
                        <div className="form-group">
                            <label htmlFor="lib-location-id">Location</label>
                            <input name="lib_location" type="text" className="form-control" onChange={this.handleChange} id="lib-location-id" placeholder={this.state.libraryItem.location} />
                        </div>
                        <div className="form-group">
                            <label htmlFor="lib-name-id">Name</label>
                            <input name="lib_name" type="text" className="form-control" onChange={this.handleChange} id="lib-name-id" placeholder={this.state.libraryItem.name}/>
                        </div>
                        <button type="submit" onClick={this.handleSubmit} className="btn btn-primary">Submit</button>
                    </form>
                </div>
            </React.Fragment>
         );
    }
}
 
export default UpdateLibrary;