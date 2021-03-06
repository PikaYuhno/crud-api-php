import React, { Component } from 'react';

class UserItem extends Component {
    constructor(props) {
        super(props);
        this.state = {

        };
    }


    handleUpdate = (e) => {
        window.location.href = window.location.origin + `/user/update/${this.props.item.id}`;
    }

    handleDelete = async (e) => {
        await fetch(`/api/user/delete.php?id=${this.props.item.id}`);
        window.location.reload();
    }

    render() { 
        return ( 
            <tr key={this.props.item.id}>
                <td>{this.props.item.id}</td>
                <td>{this.props.item.location}</td>
                <td>{this.props.item.name}</td>
                <td>
                    <button className="btn btn-success" onClick={this.handleUpdate}></button>
                    <button className="btn btn-danger" onClick={this.handleDelete}></button>
                </td>
            </tr>
         );
    }
}
 
export default UserItem;