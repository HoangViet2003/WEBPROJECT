@extends('layouts.main')

@section('main-content')


    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-title">
                            <h2>Checkout</h2>
                        </div>

                        {{-- checkout form --}}
                        <form action="#" method="post" id="checkout-form">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="full_name" placeholder="First Name"
                                        value="" required />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        required />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="address" placeholder="Address"
                                        value="" required />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="number" class="form-control" id="phone_number" min="0"
                                        placeholder="Phone No" value="" required />
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10"
                                        placeholder="Leave a comment about your order"></textarea>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>subtotal: $</span> <span id="sub-total-price">subtotal</span></li>
                            <li><span>delivery:</span> <span>Free</span></li>
                            <li><span>total: $</span> <span id="total-price">total</span></li>
                        </ul>

                        <div class="payment-method">
                            <!-- Cash on delivery -->
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="cod" checked />
                                <label class="custom-control-label" for="cod">Cash on Delivery</label>
                            </div>
                            <!-- Paypal -->
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="paypal" />
                                <label class="custom-control-label" for="paypal">Paypal
                                    <img class="ml-15" src="{{ asset('assets/img/core-img/paypal.png') }}"
                                        alt="" /></label>
                            </div>
                        </div>

                        <div class="cart-btn mt-100">
                            <a href="#" type="submit" onclick="createOrder()"
                                class="btn amado-btn w-100">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@stop


<script src="{{ asset('assets/js/checkout.js') }}" defer></script>
