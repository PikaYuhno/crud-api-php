import React, { Component } from 'react';

class AuthorItem extends Component {
    constructor(props) {
        super(props);
        this.state = {

        }
    }

    handleUpdate = () => {
        window.location.href = window.location.origin + `/author/update/${this.props.item.id}`;
    }

    handleDelete = async () => {
        await fetch(`/api/author/delete.php?id=${this.props.item.id}`);
        window.location.reload();
    }

    render() { 
        return ( 
            <tr key={this.props.item.id}>
                <td>{this.props.item.id}</td>
                <td>{this.props.item.name}</td>
                <td>{this.props.item.nationality}</td>
                <td>{this.props.item.gender}</td>
                <td>{this.props.item.birthday}</td>
                <td>
                    <button className="btn btn-success" onClick={this.handleUpdate}></button>
                    <button className="btn btn-danger" onClick={this.handleDelete}></button>
                </td>
            </tr>
        );
    }
}
 
export default AuthorItem;

