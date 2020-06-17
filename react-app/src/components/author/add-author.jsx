import React, { Component } from 'react';
import Navbar from '../navbar';

class AddAuthor extends Component {
    constructor(props) {
        super(props);
        this.state = {

        }
    }
   
    handleChange = (e) => {
        this.setState({[e.target.name]: e.target.value}); 
    }

    handleSubmit = async (e) => {
        e.preventDefault();
        let {author_name, author_nationality, author_gender, author_birthday} = this.state;
        console.log(this.state);
        await fetch(`/api/author/create.php`, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json"  
            },
            body: JSON.stringify({
                name: author_name, 
                nationality: author_nationality,
                gender: author_gender,
                birthday: author_birthday
            }) 
        });
        this.props.history.push("/author/view");
    }
    render() { 
        return ( 
            <React.Fragment>
                <Navbar />
                <div className="container" style={{marginTop: 80 + "px"}}>
                    <h1>Add an Author</h1>
                    <form>
                        <div className="form-group">
                            <label htmlFor="author-name-id">Name</label>
                            <input name="author_name" type="text" className="form-control" onChange={this.handleChange} id="author-name-id" placeholder="Enter Name" />
                        </div>
                        <div className="form-group">
                            <label htmlFor="author-nationality-id">Nationality</label>
                            <input name="author_nationality" type="text" className="form-control" onChange={this.handleChange} id="author-nationality-id" placeholder="Enter Nationality" />
                        </div>
                        <div className="form-group">
                            <label htmlFor="author-gender-id">Gender</label>
                            <input name="author_gender" type="text" className="form-control" onChange={this.handleChange} id="author-gender-id" placeholder="Enter Gender" />
                        </div>
                        <div className="form-group">
                            <label htmlFor="author-birthday-id">Birthday</label>
                            <input name="author_birthday" type="text" className="form-control" onChange={this.handleChange} id="author-birthday-id" placeholder="Enter Birthday (YYYY-MM-DD)"/>
                        </div>
                        <button type="submit" onClick={this.handleSubmit} className="btn btn-primary">Submit</button>
                    </form>
                </div>
            </React.Fragment>
        );
    }
}
 
export default AddAuthor;