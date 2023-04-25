@extends('layouts.mainAdmin') @section('main-content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2 id="product-title"></h2>
                </div>

                <div class="col-md-12">
                    <form
                        action=""
                        id="productform"
                        enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label for="id" id="product_id_label"
                                >ID (cannot change this field)</label
                            ><input
                                type="text"
                                class="form-control"
                                id="product_id"
                                name="id"
                                value=""
                                readonly
                            />
                        </div>
                        <div class="form-group">
                            <label for="fullName">Product Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="product_name"
                                id="product_name"
                                value=""
                                required
                            />
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="price">Price ( $ )</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="product_price"
                                        id="price"
                                        value=""
                                    />
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="product_quantity"
                                        >Quantity</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="product_quantity"
                                        id="quantity"
                                        value=""
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select
                                class=""
                                id="product_category"
                                name="category"
                                style="float: none !important"
                            >
                                <option value="Chair">Chair</option>
                                <option value="Bed">Bed</option>
                                <option value="Table">Table</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Home Deco">Home Deco</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                id="description"
                                rows="7"
                            ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="images">Images</label>
                            <input
                                type="file"
                                class="form-control-file"
                                name="images"
                                id="images-input"
                                multiple
                                accept="image/*"
                            />
                        </div>

                        <div
                            class="images-container"
                            id="images-container"
                        ></div>

                        <div class="row">
                            <div class="row mt-5">
                                <div class="col">
                                    <button
                                        type="submit"
                                        class="btn amado-btn"
                                        id="create-product"
                                    >
                                        Save change
                                    </button>
                                </div>

                                <div class="col">
                                    <a
                                        id="delete-btn"
                                        class="btn amado-btn active"
                                        name="delete"
                                        onclick="deleteProduct()"
                                        style="color: white"
                                    >
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### Main Content Wrapper End ##### -->
<script
    src="{{ asset('assets/js/api/Admin/productDetail.js') }}"
    defer
></script>
@endsection
