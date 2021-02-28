import React, { Component } from "react";

class InfoShipping extends Component {
    render() {
        const { props } = this;
        const { cart } = props;
        return (
            <div className="row">
                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: Mcal. Lopez"
                            name="main_street"
                            id="main_street"
                            onChange={props.handleUpdateAddressInfo}
                            value={cart.customer.address.main_street ?? ""}
                        />
                        <label htmlFor="main_street">Calle Principal *</label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: Gral Santos"
                            name="intersection_street_first"
                            id="intersection_street_first"
                            onChange={props.handleUpdateAddressInfo}
                            value={
                                cart.customer.address
                                    .intersection_street_first ?? ""
                            }
                        />
                        <label htmlFor="intersection_street_first">
                            Calle Secundaria *
                        </label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: Gral Santos"
                            name="intersection_street_second"
                            id="intersection_street_second"
                            onChange={props.handleUpdateAddressInfo}
                            value={
                                cart.customer.address
                                    .intersection_street_second ?? ""
                            }
                        />
                        <label htmlFor="intersection_street_second">
                            Intersección 2
                        </label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: 1435"
                            name="main_number"
                            id="main_number"
                            onChange={props.handleUpdateAddressInfo}
                            value={cart.customer.address.main_number ?? ""}
                        />
                        <label htmlFor="main_number">Número de Casa</label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: Casa con murallas de color blanco"
                            name="reference"
                            id="reference"
                            onChange={props.handleUpdateAddressInfo}
                            value={cart.customer.address.reference ?? ""}
                        />
                        <label htmlFor="reference">Referencia</label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: Pedro"
                            name="contact"
                            id="contact"
                            onChange={props.handleUpdateAddressInfo}
                            value={cart.customer.address.contact ?? ""}
                        />
                        <label htmlFor="contact">
                            Contacto o Persona que recibe
                        </label>
                    </div>
                </div>
            </div>
        );
    }
}

export default InfoShipping;
