import React, { Component } from "react";
import ReactDOM from "react-dom";

import OrderDisplay from "./OrderDisplay";
import SuccessDisplay from "./SuccessDisplay";

class Order extends Component {
    state = {
        page: "order",
        addresses: [],
        payments_methods: [],
        products: [],
        cities: [],
        order: {},
        message: {},
        user: {},
        cart: {
            customer: {
                name: "",
                last_name: "",
                phone_number: "",
                document_number: "",
                business_name: "",
                ruc: "",
                email: "",
                address_id: null,
            },
            products: [{ product_id: "", quantity: 1 }],
            payment_method: 1,
        },
    };

    componentDidMount() {
        this.handleGetProducts();
        this.handleGetPaymentsMethods();
        this.handleGetCities();
        this.handleGetAddresses();
        this.handleGetUserData();
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

    handleUpdateAddress = (e) => {
        const { state } = this;
        const { cart } = state;

        cart.customer[e.target.name] = e.target.value;

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

    handleGetCities = () => {
        const endpoint = "http://localhost:8000/api/cities";

        fetch(endpoint)
            .then((res) => res.json())
            .then((data) => {
                this.setState({ cities: data.cities });
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

    handleGetUserData = () => {
        const { state } = this;
        const { cart } = state;
        const endpoint = "http://localhost:8000/ajax/account/user";

        fetch(endpoint)
            .then((res) => res.json())
            .then((data) => {
                const user = data.user;
                cart.customer = {
                    name: user.name,
                    last_name: user.last_name,
                    phone_number: user.phone_number,
                    document_number: user.document_number,
                    business_name: user.business_name,
                    ruc: user.ruc,
                    email: user.email,
                    address_id: null,
                };

                this.setState({ user: data.user, cart: cart });
            })
            .catch(console.log);
    };

    handleGetAddresses = () => {
        const endpoint = "http://localhost:8000/ajax/addresses";

        fetch(endpoint)
            .then((res) => res.json())
            .then((data) => {
                this.setState({ addresses: data.addresses });
            })
            .catch(console.log);
    };

    handleSyncLocal = () => {
        console.log("work");
    };

    handleSubmitOrder = (e) => {
        e.preventDefault();
        const { state } = this;
        const { cart } = state;
        const endpoint = "http://localhost:8000/orders";

        fetch(endpoint, {
            method: "POST",
            body: JSON.stringify(cart),
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf_token,
            },
        })
            .then((res) => res.json())
            .catch((error) => console.error("Error:", error))
            .then((response) => {
                if (response.success === true && response.code === 200) {
                    this.setState({
                        page: "success",
                        order: response.body.order,
                        message: response.body.message,
                    });
                }
            });
    };

    handleResetCart = () => {
        const resetCart = {
            customer: {
                name: "",
                last_name: "",
                phone_number: "",
                document_number: "",
                business_name: "",
                ruc: "",
                email: "",
                address: {
                    main_street: "",
                    intersection_street_first: "",
                    intersection_street_second: "",
                    main_number: "",
                    contact: "",
                    reference: "",
                    city_id: 16,
                },
            },
            products: [{ product_id: "", quantity: 1 }],
            payment_method: 1,
        };

        this.setState({ cart: { ...resetCart } });
    };

    render() {
        const { state } = this;
        const { page, order, message } = state;

        return (
            <div className="container">
                {page === "order" ? (
                    <OrderDisplay
                        {...state}
                        handleAddProduct={this.handleAddProduct}
                        handleRemoveProduct={this.handleRemoveProduct}
                        handleUpdateAddressInfo={this.handleUpdateAddressInfo}
                        handleUpdateCustomerInfo={this.handleUpdateCustomerInfo}
                        handleUpdatePaymentMethod={
                            this.handleUpdatePaymentMethod
                        }
                        handleUpdateProduct={this.handleUpdateProduct}
                        handleSubmitOrder={this.handleSubmitOrder}
                        handleUpdateAddress={this.handleUpdateAddress}
                    />
                ) : null}

                {page === "success" ? (
                    <SuccessDisplay order={order} message={message} />
                ) : null}
            </div>
        );
    }
}

export default Order;

if (document.getElementById("order")) {
    ReactDOM.render(<Order />, document.getElementById("order"));
}
