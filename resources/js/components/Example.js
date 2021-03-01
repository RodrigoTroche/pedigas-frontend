import React, { Component } from "react";
import ReactDOM from "react-dom";

import OrderDisplay from "./OrderDisplay";
import SuccessDisplay from "./SuccessDisplay";

class Order extends Component {
    state = {
        page: "order",
        payments_methods: [],
        products: [],
        cities: [],
        order: {},
        message: {},
        cart: {
            customer: {
                name: "Rodrigo",
                last_name: "Troche",
                phone_number: "0986240980",
                document_number: "5075936",
                business_name: "Rodrigo Troche",
                ruc: "5075936-1",
                email: "rodrigo.troche15@gmail.com",
                address: {
                    main_street: "Amancio Gonzalez",
                    intersection_street_first: "Ecuador",
                    intersection_street_second: null,
                    main_number: "1325",
                    contact: "Rodrigo Troche",
                    reference: "Casa de Rejas blancas y marrones",
                    city_id: 16,
                },
            },
            products: [{ product_id: "", quantity: 1 }],
            payment_method: 1,
        },
    };

    componentDidMount() {
        this.handleGetProducts();
        this.handleGetPaymentsMethods();
        this.handleGetCities();
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

    handleSyncLocal = () => {
        console.log("work");
    };

    handleSubmitOrder = (e) => {
        e.preventDefault();
        const { state } = this;
        const { cart } = state;
        const endpoint = "http://localhost:8000/api/orders";

        fetch(endpoint, {
            method: "POST",
            body: JSON.stringify(cart),
            headers: {
                "Content-Type": "application/json",
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
