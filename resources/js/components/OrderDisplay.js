import React, { Component } from "react";
import ProductsCart from "./ProductsCart";
import InfoContact from "./InfoContact";
import InfoShipping from "./InfoShipping";

class OrderDisplay extends Component {
    render() {
        const { props } = this;
        const { cart, payments_methods, products, cities } = props;

        return (
            <React.Fragment>
                <div className="row justify-content-center">
                    <div className="col-md-8 text-center">
                        <h3>¡Hacé tu Pedido Acá!</h3>
                    </div>
                </div>
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card mb-4 mt-4">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-md-12">
                                        <h5>Elegí tus productos</h5>
                                        <hr />
                                    </div>
                                </div>

                                <ProductsCart
                                    handleUpdateProduct={
                                        props.handleUpdateProduct
                                    }
                                    handleRemoveProduct={
                                        props.handleRemoveProduct
                                    }
                                    cart={cart}
                                    products={products}
                                />

                                <div className="row">
                                    <div className="col-md-12">
                                        <button
                                            className="btn btn-outline-primary btn-sm"
                                            onClick={props.handleAddProduct}
                                            title="Agregar más productos"
                                        >
                                            Agregar más
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="card">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-md-12">
                                        <h5>Información de Contacto</h5>
                                        <hr />
                                    </div>
                                </div>

                                <InfoContact
                                    cart={cart}
                                    handleUpdateCustomerInfo={
                                        props.handleUpdateCustomerInfo
                                    }
                                />

                                <div className="row">
                                    <div className="col-md-12">
                                        <h5>Información de Envío</h5>
                                        <hr />
                                    </div>
                                </div>

                                <InfoShipping
                                    cart={cart}
                                    cities={cities}
                                    handleUpdateAddressInfo={
                                        props.handleUpdateAddressInfo
                                    }
                                />

                                <div className="row">
                                    <div className="col-md-12">
                                        <h5>Forma de pago</h5>
                                        <hr />
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-6">
                                        <div className="mb-3">
                                            <div className="form-floating">
                                                <select
                                                    className="form-select"
                                                    id="floatingSelectPayment"
                                                    aria-label="Forma de Pago"
                                                    name="payment_method"
                                                    value={
                                                        cart.payment_method ??
                                                        ""
                                                    }
                                                    onChange={
                                                        props.handleUpdatePaymentMethod
                                                    }
                                                >
                                                    <option>
                                                        Seleccione una opción
                                                    </option>
                                                    {payments_methods.map(
                                                        (method, key) => (
                                                            <option
                                                                key={key.toString()}
                                                                value={
                                                                    method.id
                                                                }
                                                            >
                                                                {method.name}
                                                            </option>
                                                        )
                                                    )}
                                                </select>
                                                <label htmlFor="floatingSelectPayment">
                                                    Forma de Pago
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="card-footer bg-white">
                                <button
                                    className="btn btn-success w-100"
                                    onClick={props.handleSubmitOrder}
                                >
                                    Confirmar pedido
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default OrderDisplay;
