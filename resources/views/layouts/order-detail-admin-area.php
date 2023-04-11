<link rel="stylesheet" href="./css/order-tracking.css" />
<!-- Product Catagories Area Start -->

<?php
if ($_GET["id"]) {
 $order_id = $_GET["id"];
 $order_details = $order->getOrderById($order_id);

 $order_items = $order->getAllOrderItems($order_id);
}
?>

<div class="dashboard-table-area section-padding-100">
 <div>
  <div>
   <div>
    <div class="cart-title mt-50">
     <h2>Order Details</h2>
    </div>

    <div class="card-body">
     <h6>Order ID: <?php echo $order_id ?></h6>
     <article class="card">
      <div class="card-body row">
       <div class="col"> <strong>Created at:</strong> <br>
        <?php echo $order_details["created_at"] ?>
       </div>
       <div class="col"> <strong>Shipping TO:</strong> <br> <?php echo $order_details["address"] ?> | <i class="fa fa-phone"></i> <?php echo $order_details["phone_number"] ?> </div>
       <div class="col"> <strong>Total: </strong> <br> $ <?php echo $order_details["total"] ?>
       </div>
       <div class="col"> <strong>Status: </strong> <br><?php echo $order_details["is_confirmed"] == 0 ? "Unconfirmed" : "Confirmed" ?> </div>
      </div>
     </article>
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

     <?php
     if ($order_details["is_confirmed"] == 0) {
     ?>
      <button class="btn amado-btn" onclick="confirmOrder(<?php echo $order_id ?>)">Confirm Order</button>
     <?php
     }
     ?>
    </div>
   </div>
  </div>
 </div>
</div>
</div>
<!-- Product Catagories Area End -->

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;
<script src='./js/confirmOrder.js'></script>