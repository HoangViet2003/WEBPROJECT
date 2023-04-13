<link rel="stylesheet" href="{{asset('assets/css/order-tracking.css')}}" />

{{-- <?php
      if ($_GET["id"]) {
        $order_id = $_GET["id"];
        $order_details = $order->getOrderById($order_id);

        $order_items = $order->getAllOrderItems($order_id);
      }
      ?> --}}

<div class="cart-table-area section-padding-100">
  <div class="cart-title mt-50">
    <h2>Order Tracking</h2>
  </div>
  <div class="card-body">
    <h6>Order ID: 1</h6>
    <article class="card">
      <div class="card-body row">
        <div class="col"> <strong>Estimated delivery date:</strong> <br>
          02/02/2003
        </div>
        <div class="col"> <strong>Shipping TO:</strong> <br> address | <i class="fa fa-phone"></i> phone number</div>
        <div class="col"> <strong>Total: </strong> <br> $ total</div>
        <div class="col"> <strong>Status: </strong> <br> is confirmed </div>
      </div>
    </article>
    <div class="track">
      {{-- <?php
            if ($order_details["is_confirmed"] == 0) {
            ?> --}}
      <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
      <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order shipped</span> </div>
      <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Order delivered</span> </div>
      {{-- <?php
            } else {
            ?> --}}
      {{-- <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order shipped</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Order delivered</span> </div> --}}
      {{-- <?php
            }
            ?> --}}
    </div>
    <hr>
    <ul class="row">

      <li class="col-md-4">
        <figure class="itemside mb-3">
          <div><img src="{{asset('assets/img/product-img/product3.jpg')}}" class="img-sm rounded"></div>
          <figcaption class=" info align-self-center"></figcaption>
            <p class="title">item name</p> <span class="text-muted">$ 100 price * 10 = $ 1000</span> <span> </span>
          </figcaption>
        </figure>
      </li>
      //
      <li class="col-md-4">
        <figure class="itemside mb-3">
          <div><img src="{{asset('assets/img/product-img/product4.jpg')}}" class="img-sm rounded"></div>
          <figcaption class=" info align-self-center">
            <p class="title">item name</p> <span class="text-muted">$ 100 price * 10 = $ 1000</span> <span> </span>
          </figcaption>
        </figure>
      </li>


    </ul>
    <hr>
  </div>
</div>