import React, { Component } from "react";

class SuccessDisplay extends Component {
    render() {
        const { props } = this;
        const { order, message } = props;

        return (
            <React.Fragment>
                <div className="row justify-content-center">
                    <div className="col-md-6 text-center">
                        <h2>{message.title}</h2>
                        <p>{message.content}</p>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default SuccessDisplay;
