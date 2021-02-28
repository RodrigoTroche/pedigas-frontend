import React, { Component } from "react";
import ReactDOM from "react-dom";

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
                    main_street: "",
                },
            },
            products: [{ product_id: "", quantity: 1 }],
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
                                        <h4>Productos</h4>
                                        <hr />
                                    </div>
                                </div>
                                {cart.products.map((item, cart_key) => (
                                    <div className="row">
                                        <div className="col-md-5">
                                            <div className="mb-3">
                                                <div className="form-floating">
                                                    <select
                                                        className="form-select"
                                                        id="floatingSelect"
                                                        aria-label="Producto"
                                                        name={"product_id"}
                                                        value={item.product_id}
                                                        onChange={(e) =>
                                                            this.handleUpdateProduct(
                                                                e,
                                                                cart_key
                                                            )
                                                        }
                                                    >
                                                        <option>
                                                            Seleccione un
                                                            producto
                                                        </option>
                                                        {products.map(
                                                            (product, key) => (
                                                                <option
                                                                    key={key.toString()}
                                                                    value={
                                                                        product.id
                                                                    }
                                                                >
                                                                    {product.name +
                                                                        " - " +
                                                                        product.price}
                                                                </option>
                                                            )
                                                        )}
                                                    </select>
                                                    <label htmlFor="floatingSelect">
                                                        Producto
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-md-5">
                                            <div className="form-floating mb-3">
                                                <input
                                                    type="email"
                                                    className="form-control"
                                                    id="quantity"
                                                    placeholder="1"
                                                    value={item.quantity}
                                                    name={"quantity"}
                                                    onChange={(e) =>
                                                        this.handleUpdateProduct(
                                                            e,
                                                            cart_key
                                                        )
                                                    }
                                                />
                                                <label htmlFor="quantity">
                                                    Cantidad
                                                </label>
                                            </div>
                                        </div>
                                        <div className="col-md-2">
                                            <button
                                                className="btn btn-primary"
                                                onClick={(e) =>
                                                    this.handleRemoveProduct(
                                                        e,
                                                        cart_key
                                                    )
                                                }
                                            >
                                                Eliminar
                                            </button>
                                        </div>
                                    </div>
                                ))}

                                <div className="row">
                                    <div className="col-md-12">
                                        <button
                                            className="btn btn-primary"
                                            onClick={this.handleAddProduct}
                                        >
                                            Agregar +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="card">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-md-12">
                                        <h4>Información de Contacto</h4>
                                        <hr />
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-6">
                                        <div className="form-floating mb-3">
                                            <input
                                                type="text"
                                                className="form-control"
                                                name="name"
                                                id="name"
                                                onChange={
                                                    this
                                                        .handleUpdateCustomerInfo
                                                }
                                                value={cart.customer.name ?? ""}
                                                placeholder="Ej: Pedro"
                                            />
                                            <label htmlFor="name">
                                                Nombre *
                                            </label>
                                        </div>
                                    </div>
                                    <div className="col-md-6">
                                        <div className="form-floating mb-3">
                                            <input
                                                type="text"
                                                className="form-control"
                                                name="last_name"
                                                id="last_name"
                                                onChange={
                                                    this
                                                        .handleUpdateCustomerInfo
                                                }
                                                value={
                                                    cart.customer.last_name ??
                                                    ""
                                                }
                                                placeholder="Ej: Ortigoza"
                                            />
                                            <label htmlFor="last_naem">
                                                Apellido *
                                            </label>
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
                                                onChange={
                                                    this
                                                        .handleUpdateCustomerInfo
                                                }
                                                value={
                                                    cart.customer
                                                        .phone_number ?? ""
                                                }
                                            />
                                            <label htmlFor="phone_number">
                                                Teléfono *
                                            </label>
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
                                                onChange={
                                                    this
                                                        .handleUpdateCustomerInfo
                                                }
                                                value={
                                                    cart.customer
                                                        .document_number ?? ""
                                                }
                                            />
                                            <label htmlFor="document_number">
                                                CI *
                                            </label>
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
                                                onChange={
                                                    this
                                                        .handleUpdateCustomerInfo
                                                }
                                                value={
                                                    cart.customer.email ?? ""
                                                }
                                            />
                                            <label htmlFor="email">Email</label>
                                        </div>
                                    </div>

                                    <div className="col-md-12">
                                        <h4>Desea factura?</h4>
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
                                                onChange={
                                                    this
                                                        .handleUpdateCustomerInfo
                                                }
                                                value={
                                                    cart.customer
                                                        .business_name ?? ""
                                                }
                                            />
                                            <label htmlFor="business_name">
                                                Razón Social
                                            </label>
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
                                                onChange={
                                                    this
                                                        .handleUpdateCustomerInfo
                                                }
                                                value={cart.customer.ruc ?? ""}
                                            />
                                            <label htmlFor="ruc">RUC</label>
                                        </div>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-12">
                                        <h4>Información de Envío</h4>
                                        <hr />
                                    </div>
                                </div>

                                <div className="row">
                                    <div className="col-md-6">
                                        <div className="form-floating mb-3">
                                            <input
                                                type="text"
                                                className="form-control"
                                                placeholder="Ej: Mcal. Lopez"
                                                name="main_street"
                                                id="main_street"
                                                onChange={
                                                    this.handleUpdateAddressInfo
                                                }
                                                value={
                                                    cart.customer.address
                                                        .main_street ?? ""
                                                }
                                            />
                                            <label htmlFor="main_street">
                                                Calle Principal *
                                            </label>
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
                                                onChange={
                                                    this.handleUpdateAddressInfo
                                                }
                                                value={
                                                    cart.customer.address
                                                        .intersection_street_first ??
                                                    ""
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
                                                onChange={
                                                    this.handleUpdateAddressInfo
                                                }
                                                value={
                                                    cart.customer.address
                                                        .intersection_street_second ??
                                                    ""
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
                                                onChange={
                                                    this.handleUpdateAddressInfo
                                                }
                                                value={
                                                    cart.customer.address
                                                        .main_number ?? ""
                                                }
                                            />
                                            <label htmlFor="main_number">
                                                Número de Casa
                                            </label>
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
                                                onChange={
                                                    this.handleUpdateAddressInfo
                                                }
                                                value={
                                                    cart.customer.address
                                                        .reference ?? ""
                                                }
                                            />
                                            <label htmlFor="reference">
                                                Referencia
                                            </label>
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
                                                onChange={
                                                    this.handleUpdateAddressInfo
                                                }
                                                value={
                                                    cart.customer.address
                                                        .contact ?? ""
                                                }
                                            />
                                            <label htmlFor="contact">
                                                Contacto o Persona que recibe
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div className="row">
                                    <div className="col-md-12">
                                        <h4>Forma de pago</h4>
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
                            <div class="card-footer">
                                <button className="btn btn-success">
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
