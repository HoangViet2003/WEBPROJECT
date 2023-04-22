@extends('layouts.main')

@section('main-content')
    <link rel="stylesheet" href="{{ asset('assets/css/core-style.css') }}" />

    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Shopping Cart</h2>
                    </div>

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Price ($ US)</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>

                            <tbody id="cart-item-section">
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <form class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li>
                                <span>subtotal :</span>
                                <span id="sub-total-price" class="number-separator"></span>
                            </li>
                            <li><span>delivery :</span> <span>Free</span></li>
                            <li>
                                <span>total :</span> <span id="total-price" class="number-separator"></span>
                            </li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <a onclick="checkout()" href="/checkout" class="btn amado-btn w-100">Checkout</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
    <script src="{{ asset('assets/js/api/User/cart.js') }}"></script>
    {{-- <script src="{{asset('assets/js/cart.js')}}"></script> --}}
@endsection
