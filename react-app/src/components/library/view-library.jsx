import React, { Component } from 'react';
import {Table} from 'react-bootstrap';
import Navbar from '../navbar';
import LibraryItem from './sub-components/library-item';

class ViewLibrary extends Component {
    constructor(props) {
        super(props);
        this.state = { data: [] };
    }
    async componentDidMount() {
        const promise = await fetch(`/api/library/read.php`);
        console.log("TEsT");
        const json = await promise.json();
        console.log(json);
        this.setState({data: json});
    }

    renderData = () => {
        return this.state.data.map((data, index) => {
            return (
                <LibraryItem item={data} />
            );
        });
    }

    render() { 
        return ( 
            <React.Fragment>
                <Navbar />
                <div className="container" style={{marginTop: 50}}>
                    <h1>Libraries</h1>
                    <Table>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Location</th>
                                <th scope="col">Name</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            {this.renderData()}
                        </tbody>
                    </Table>
                    <div className="row">
                        <div className="span6" style={{float: 'none', marginTop: 0, marginRight: 'auto', marginBottom: 0, marginLeft: 'auto'}}>
                            <input type="button" className="btn btn-primary" value="+ Add" onClick={() => { this.props.history.push("/library/add")}}/> 
                        </div>
                    </div>
                </div>
            </React.Fragment>
         );
    }
}
 
export default ViewLibrary;