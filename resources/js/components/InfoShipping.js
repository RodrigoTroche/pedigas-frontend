import React, { Component } from "react";

class InfoShipping extends Component {
    render() {
        const { props } = this;
        const { cart, cities, addresses } = props;
        return (
            <div className="row">
                <div className="col-md-6">
                    <div className="mb-3">
                        <div className="form-floating">
                            <select
                                className="form-select"
                                id="floatingSelectAddress"
                                aria-label="Forma de Pago"
                                name="address_id"
                                value={cart.customer.address_id ?? ""}
                                onChange={props.handleUpdateAddress}
                            >
                                <option>Seleccione una opción</option>
                                {addresses.map((address, key) => (
                                    <option
                                        key={key.toString()}
                                        value={address.id}
                                    >
                                        {address.main_address}
                                    </option>
                                ))}
                            </select>
                            <label htmlFor="floatingSelectAddress">
                                Dirección
                            </label>
                        </div>
                    </div>
                    <div className="mb-3">
                        <a
                            className="btn btn-outline-primary btn-sm"
                            href="mi-cuenta/direcciones/crear"
                        >
                            Agregar una dirección
                        </a>
                    </div>
                </div>
            </div>
        );
    }
}

export default InfoShipping;
