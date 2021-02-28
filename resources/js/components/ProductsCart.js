import React, { Component } from "react";

class ProductsCart extends Component {
    render() {
        const { props } = this;
        const { cart, products } = props;

        return cart.products.map((item, cart_key) => (
            <div className="row mb-3" key={cart_key.toString()}>
                <div className="col-md-7">
                    <div className="form-floating">
                        <select
                            className="form-select"
                            id="floatingSelect"
                            aria-label="Producto"
                            name={"product_id"}
                            value={item.product_id}
                            onChange={(e) =>
                                props.handleUpdateProduct(e, cart_key)
                            }
                        >
                            <option>Seleccione un producto</option>
                            {products.map((product, key) => (
                                <option key={key.toString()} value={product.id}>
                                    {product.name + " - " + product.price}
                                </option>
                            ))}
                        </select>
                        <label htmlFor="floatingSelect">Producto</label>
                    </div>
                </div>
                <div className="col-md-4">
                    <div className="form-floating">
                        <input
                            type="email"
                            className="form-control"
                            id="quantity"
                            placeholder="1"
                            value={item.quantity}
                            name={"quantity"}
                            onChange={(e) =>
                                props.handleUpdateProduct(e, cart_key)
                            }
                        />
                        <label htmlFor="quantity">Cantidad</label>
                    </div>
                </div>
                <div className="col-md-1 mt-auto mb-auto text-right">
                    <button
                        className="btn btn-sm btn-outline-danger"
                        onClick={(e) => props.handleRemoveProduct(e, cart_key)}
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            className="bi bi-trash"
                            viewBox="0 0 16 16"
                        >
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path
                                fillRule="evenodd"
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        ));
    }
}

export default ProductsCart;
