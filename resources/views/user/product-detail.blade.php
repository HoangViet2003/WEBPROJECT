@extends('layouts.main') @section('main-content')
<!-- Product Catagories Area Start -->
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Furniture</a></li> -->
                        <li class="breadcrumb-item">
                            <a href="#" id="product-category"></a>
                        </li>
                        <li
                            class="breadcrumb-item active"
                            aria-current="page"
                            id="product-title"
                        ></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div
                        id="product_details_slider"
                        class="carousel slide"
                        data-ride="carousel"
                    >
                        <ol
                            class="carousel-indicators"
                            id="product-image-slide"
                        ></ol>

                        <div class="carousel-inner" id="product-image"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price" id="product-price"></p>
                        <a href="product-details.html">
                            <h6 id="product-name"></h6>
                        </a>
                        <!-- Ratings & Review -->
                        <div
                            class="ratings-review mb-15 d-flex align-items-center justify-content-between"
                        >
                            <div class="ratings" id="rating-star"></div>
                            <div class="review">
                                <a href="#">Write A Review</a>
                            </div>
                        </div>
                        <!-- Avaiable -->
                        <p id="product-status"></p>
                    </div>

                    <div class="short_overview my-5">
                        <p id="product-description"></p>
                    </div>

                    <!-- Add to Cart Form -->
                    <form class="cart clearfix" id="add-cart-form">
                        <div class="cart-btn d-flex mb-50">
                            <p>Qty</p>

                            <div class="quantity">
                                <span
                                    class="qty-minus"
                                    onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) && qty > 1 ) effect.value--;return false;"
                                    ><i
                                        class="fa fa-caret-down"
                                        aria-hidden="true"
                                    ></i
                                ></span>
                                <input
                                    type="number"
                                    class="qty-text"
                                    id="qty"
                                    step="1"
                                    min="1"
                                    name="quantity"
                                    value="1"
                                    id="quantity-selection"
                                />
                                <span
                                    class="qty-plus"
                                    onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"
                                    ><i
                                        class="fa fa-caret-up"
                                        aria-hidden="true"
                                    ></i
                                ></span>
                            </div>
                        </div>

                        <button
                            class="btn amado-btn"
                            id="btn-add"
                            type="submit"
                        >
                            Add to cart
                        </button>

                        <button
                            type="button"
                            name="addtocart"
                            class="btn"
                            disabled
                            id="btn-out-of-order"
                        >
                            Out of order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Details Area End -->

<script src="{{ asset('assets/js/api/User/productDetail.js') }}" defer></script>
@endsection
