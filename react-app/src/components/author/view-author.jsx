import React, { Component } from 'react';
import AuthorItem from './sub-components/author-item';
import Navbar from '../navbar';
import {Table} from 'react-bootstrap'; 
class ViewAuthor extends Component {
    constructor(props) {
        super(props);
        this.state = { data: [] };
    }
    async componentDidMount() {
        const promise = await fetch(`http://localhost:80/api/author/read.php`);
        const json = await promise.json();
        this.setState({data: json});
    }

    renderData = () => {
        return this.state.data.map((data, index) => {
            return (
                <AuthorItem item={data} />
            );
        });
    }

    render() { 
        return ( 
            <React.Fragment>
                <Navbar />
                <div className="container" style={{marginTop: 50}}>
                    <h1>Authors</h1>
                    <Table>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            {this.renderData()}
                        </tbody>
                    </Table>
                    <div className="row">
                        <div className="span6" style={{float: 'none', marginTop: 0, marginRight: 'auto', marginBottom: 0, marginLeft: 'auto'}}>
                            <input type="button" className="btn btn-primary" value="+ Add" onClick={() => {this.props.history.push("/author/add");}}/> 
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}
 
export default ViewAuthor;