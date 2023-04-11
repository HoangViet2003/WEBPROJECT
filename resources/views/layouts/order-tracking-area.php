<link rel="stylesheet" href="./css/order-tracking.css" />

<?php
if ($_GET["id"]) {
 $order_id = $_GET["id"];
 $order_details = $order->getOrderById($order_id);

 $order_items = $order->getAllOrderItems($order_id);
}
?>

<div class="cart-table-area section-padding-100">
 <div class="cart-title mt-50">
  <h2>Order Tracking</h2>
 </div>
 <div class="card-body">
  <h6>Order ID: <?php echo $order_id ?></h6>
  <article class="card">
   <div class="card-body row">
    <div class="col"> <strong>Estimated delivery date:</strong> <br>
     <?php $date = date('d - m - Y', mktime(0, 0, 0, date('m'), date('d') + 5, date('Y')));
     echo $date ?>
    </div>
    <div class="col"> <strong>Shipping TO:</strong> <br> <?php echo $order_details["address"] ?> | <i class="fa fa-phone"></i> <?php echo $order_details["phone_number"] ?> </div>
    <div class="col"> <strong>Total: </strong> <br> $ <?php echo $order_details["total"] ?> </div>
    <div class="col"> <strong>Status: </strong> <br><?php echo $order_details["is_confirmed"] == 0 ? "Waiting for confirmation" : "Confirmed" ?> </div>
   </div>
  </article>
  <div class="track">
   <?php
   if ($order_details["is_confirmed"] == 0) {
   ?>
    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order shipped</span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Order delivered</span> </div>
   <?php
   } else {
   ?>
    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order shipped</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Order delivered</span> </div>
   <?php
   }
   ?>
  </div>
  <hr>
  <ul class="row">
   <?php
   foreach ($order_items as $item) {
    $images = json_decode($item['images']);
   ?>
    <li class="col-md-4">
     <figure class="itemside mb-3">
      <div><img src="<?php echo $images[0] ?>" class="img-sm rounded"></div>
      <figcaption class=" info align-self-center">
       <p class="title"><?php echo $item["name"] ?></p> <span class="text-muted">$ <?php echo $item["price"] ?> * <?php echo $item["quantity"] ?> = $ <?php echo $item["price"] * $item["quantity"] ?></span> <span> </span>
      </figcaption>
     </figure>
    </li>

   <?php } ?>

  </ul>
  <hr>
 </div>
</div>