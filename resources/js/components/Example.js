import React, { Component } from "react";
import ReactDOM from "react-dom";

class Order extends Component {
    state = {
        products: [],
        cart: {
            customer: {
                name: "",
                last_name: "",
                phone_number: "",
                document_number: "",
                business_name: "",
            },
            products: [{ product_id: "", quantity: 1 }],
        },
    };

    componentDidMount() {
        this.handleGetProducts();
    }

    handleUpdateProduct = (e, key) => {
        const { state } = this;
        const { cart } = state;

        cart.products[key][e.target.name] = e.target.value;

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

    render() {
        const { state } = this;
        const { cart, products } = state;

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
                            <div className="card-header">Productos</div>

                            <div className="card-body">
                                {cart.products.map((item, cart_key) => (
                                    <div className="row">
                                        <div className="col-md-5">
                                            <div className="form-group">
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
                                                    <label for="floatingSelect">
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
                                                <label for="quantity">
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
                            <div className="card-header">
                                Información de Envío
                            </div>

                            <div className="card-body">
                                <div className="row">
                                    <div className="col-md-6">
                                        <div className="form-group">
                                            <label>Nombre *</label>
                                            <input
                                                type="text"
                                                className="form-control"
                                            />
                                        </div>
                                    </div>
                                    <div className="col-md-6">
                                        <div className="form-group">
                                            <label>Apellido *</label>
                                            <input
                                                type="text"
                                                className="form-control"
                                            />
                                        </div>
                                    </div>

                                    <div className="col-md-6">
                                        <div className="form-group">
                                            <label>Teléfono *</label>
                                            <input
                                                type="text"
                                                className="form-control"
                                                placeholder="Ej: 0986240847"
                                            />
                                        </div>
                                    </div>

                                    <div className="col-md-6">
                                        <div className="form-group">
                                            <label>Razón Social</label>
                                            <input
                                                type="text"
                                                className="form-control"
                                                placeholder="Ej: 0986240847"
                                            />
                                        </div>
                                    </div>

                                    <div className="col-md-6">
                                        <div className="form-group">
                                            <label>RUC / CI</label>
                                            <input
                                                type="text"
                                                className="form-control"
                                                placeholder="Ej: 0986240847"
                                            />
                                        </div>
                                    </div>
                                </div>
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
