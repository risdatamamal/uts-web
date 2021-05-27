import React from 'react';
import ReactDOM from 'react-dom';

function Delete(props) {
    const destroy = () => {
        console.log(props.endpoint);
    }

    return (
        <button onClick={destroy} className="btn btn-danger">Delete</button>
    );
}

export default Delete;

if (document.querySelectorAll('.delete')) {
    const deleteNodes = document.querySelectorAll('.delete')
    deleteNodes.forEach((item) => {
        var endpoint = item.getAttribute('endpoint')
        ReactDOM.render(<Delete />, item);
    })
}
