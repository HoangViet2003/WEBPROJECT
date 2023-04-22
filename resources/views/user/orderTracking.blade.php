@extends('layouts.main') @section('main-content')
<link rel="stylesheet" href="{{ asset('assets/css/order-tracking.css') }}" />

<div class="cart-table-area section-padding-100">
    <div class="cart-title mt-50">
        <h2>Order Tracking</h2>
    </div>
    <div class="card-body">
        <h6>Order ID: <span id="orderId"></span></h6>
        <article class="card">
            <div class="card-body row">
                <div class="col">
                    <strong>Estimated delivery date:</strong> <br />
                    <span id="estimateDate"></span>
                </div>
                <div class="col">
                    <strong>Shipping TO:</strong> <br />
                    <span id="address"></span>
                </div>
                <div class="col">
                    <strong>Total: </strong> <br />
                    $ <span id="total"></span>
                </div>
                <div class="col">
                    <strong>Status: </strong> <br />
                    <span id="status"></span>
                </div>
            </div>
        </article>
        <div class="track" id="track"></div>
        <hr />

        <ul class="row" id="productItemsContainer"></ul>
        <hr />
    </div>
</div>
<script src="{{ asset('assets/js/api/User/orderTracking.js') }}" defer></script>
@stop
