import React, { Component } from "react";
import ReactDOM from "react-dom";

import ProductsCart from "./ProductsCart";
import InfoContact from "./InfoContact";
import InfoShipping from "./InfoShipping";

class Order extends Component {
    state = {
        payments_methods: [],
        products: [],
        cart: {
            customer: {
                name: "",
                last_name: "",
                phone_number: "",
                document_number: "",
                business_name: "",
                address: {
                    main_street: null,
                    intersection_street_first: null,
                    intersection_street_second: null,
                    main_number: null,
                    contact: null,
                    reference: null,
                },
            },
            products: [{ product_id: "", quantity: 1 }],
            payment_method: 1,
        },
    };

    componentDidMount() {
        this.handleGetProducts();
        this.handleGetPaymentsMethods();
    }

    handleUpdateProduct = (e, key) => {
        const { state } = this;
        const { cart } = state;

        cart.products[key][e.target.name] = e.target.value;

        this.setState({ cart: cart });
    };

    handleUpdateCustomerInfo = (e) => {
        const { state } = this;
        const { cart } = state;

        cart.customer[e.target.name] = e.target.value;

        this.setState({ cart: cart });
    };

    handleUpdateAddressInfo = (e) => {
        const { state } = this;
        const { cart } = state;

        cart.customer.address[e.target.name] = e.target.value;

        this.setState({ cart: cart });
    };

    handleUpdatePaymentMethod = (e) => {
        const { state } = this;
        const { cart } = state;

        cart[e.target.name] = e.target.value;

        this.setState({ cart: cart });
    };

    handleRemoveProduct = (e, key) => {
        const { state } = this;
        const { cart } = state;

        cart.products.splice(key, 1);

        this.setState({ cart: cart });
    };

    handleAddProduct = (e) => {
        const { state } = this;
        const { cart } = state;

        cart.products.push({ product_id: "", quantity: 0 });

        this.setState({ cart: cart });
    };

    handleGetProducts = () => {
        const endpoint = "http://localhost:8000/api/products";

        fetch(endpoint)
            .then((res) => res.json())
            .then((data) => {
                this.setState({ products: data.products });
            })
            .catch(console.log);
    };

    handleGetPaymentsMethods = () => {
        const endpoint = "http://localhost:8000/api/payments_methods";

        fetch(endpoint)
            .then((res) => res.json())
            .then((data) => {
                this.setState({ payments_methods: data.payments_methods });
            })
            .catch(console.log);
    };

    handleSubmitOrder = (e) => {
        e.preventDefault();
        const { state } = this;
        const { cart } = state;

        console.log(cart);
    };

    render() {
        const { state } = this;
        const { cart, payments_methods, products } = state;

        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <h3>¡Hacé tu Pedido Acá!</h3>
                    </div>
                </div>
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card mb-4 mt-4">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-md-12">
                                        <h5>Productos</h5>
                                        <hr />
                                    </div>
                                </div>

                                <ProductsCart
                                    handleUpdateProduct={
                                        this.handleUpdateProduct
                                    }
                                    handleRemoveProduct={
                                        this.handleRemoveProduct
                                    }
                                    cart={cart}
                                    products={products}
                                />

                                <div className="row">
                                    <div className="col-md-12 mt-3">
                                        <button
                                            className="btn btn-outline-primary btn-sm"
                                            onClick={this.handleAddProduct}
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
                                        this.handleUpdateCustomerInfo
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
                                    handleUpdateAddressInfo={
                                        this.handleUpdateAddressInfo
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
                                                        this
                                                            .handleUpdatePaymentMethod
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
                                    className="btn btn-success"
                                    onClick={this.handleSubmitOrder}
                                >
                                    Confirmar pedido
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Order;

if (document.getElementById("order")) {
    ReactDOM.render(<Order />, document.getElementById("order"));
}
