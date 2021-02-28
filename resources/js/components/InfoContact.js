import React, { Component } from "react";

class InfoContact extends Component {
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
                            name="name"
                            id="name"
                            onChange={props.handleUpdateCustomerInfo}
                            value={cart.customer.name ?? ""}
                            placeholder="Ej: Pedro"
                        />
                        <label htmlFor="name">Nombre *</label>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            name="last_name"
                            id="last_name"
                            onChange={props.handleUpdateCustomerInfo}
                            value={cart.customer.last_name ?? ""}
                            placeholder="Ej: Ortigoza"
                        />
                        <label htmlFor="last_naem">Apellido *</label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: 0986240847"
                            name="phone_number"
                            id="phone_number"
                            onChange={props.handleUpdateCustomerInfo}
                            value={cart.customer.phone_number ?? ""}
                        />
                        <label htmlFor="phone_number">Teléfono *</label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="CI"
                            name="document_number"
                            id="document_number"
                            onChange={props.handleUpdateCustomerInfo}
                            value={cart.customer.document_number ?? ""}
                        />
                        <label htmlFor="document_number">CI *</label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: tunombre@gmail.com"
                            name="email"
                            id="email"
                            onChange={props.handleUpdateCustomerInfo}
                            value={cart.customer.email ?? ""}
                        />
                        <label htmlFor="email">Email</label>
                    </div>
                </div>

                <div className="col-md-12">
                    <h5>Desea factura?</h5>
                    <hr />
                </div>
                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Razón Social"
                            name="business_name"
                            id="business_name"
                            onChange={props.handleUpdateCustomerInfo}
                            value={cart.customer.business_name ?? ""}
                        />
                        <label htmlFor="business_name">Razón Social</label>
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-floating mb-3">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ej: 4444999-1"
                            name="ruc"
                            id="ruc"
                            onChange={props.handleUpdateCustomerInfo}
                            value={cart.customer.ruc ?? ""}
                        />
                        <label htmlFor="ruc">RUC</label>
                    </div>
                </div>
            </div>
        );
    }
}

export default InfoContact;
