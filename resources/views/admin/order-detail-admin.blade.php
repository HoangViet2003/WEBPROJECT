@extends('layouts.mainAdmin') @section('main-content')
<!-- <link rel="stylesheet" href="./css/order-tracking.css" /> -->
<!-- Product Catagories Area Start -->

<div class="dashboard-table-area section-padding-100">
  <div>
    <div>
      <div>
        <div class="cart-title mt-50">
          <h2>Order Details</h2>
        </div>

        <div class="card-body">
          <h6>Order ID: 1</h6>
          <article class="card">
            <div class="card-body row">
              <div class="col"> <strong>Created at:</strong> <br>
                2/2/3003
              </div>
              <div class="col"> <strong>Shipping TO:</strong> <br> 123 abc| <i class="fa fa-phone"></i> 0333333 </div>
              <div class="col"> <strong>Total: </strong> <br> $ 100
              </div>
              <div class="col"> <strong>Status: </strong> <br>confirmed </div>
            </div>
          </article>
          <hr>
          <ul class="row">
            {{-- <?php
                  foreach ($order_items as $item) {
                    $images = json_decode($item['images']);
                  ?> --}}
            <li class="col-md-4">
              <figure class="itemside mb-3">
                <div><img src="" class="img-sm rounded"></div>
                <figcaption class=" info align-self-center">
                  <p class="title">chair</p> <span class="text-muted">$ 100 *10 = $ 10000</span> <span> </span>
                </figcaption>
              </figure>
            </li>
            {{-- <?php } ?> --}}

          </ul>
          <hr>

          {{-- <?php
                if ($order_details["is_confirmed"] == 0) {
                ?> --}}
          <button class="btn amado-btn" onclick="confirmOrder()">Confirm Order</button>
          {{-- <?php
                }
                ?> --}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Product Catagories Area End -->


<!-- <script src='./js/confirmOrder.js'></script> -->
<script src="{{ asset('assets/js/api/Admin/orderDetail.js') }}" defer></script>
<!-- Product Catagories Area End -->
@endsection
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;