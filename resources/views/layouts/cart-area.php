<?php
// User need to log in to view this page
// Get order by cart_id
$order = $order->getOrderByCartId($_SESSION['cart_id']);

if (!isset($_SESSION['useremail'])) {
 $_SESSION['product_url'] = $_SERVER['REQUEST_URI'];
?>
 <script>
  alert("Please login to view items in your cart!");
  window.location.href = "login.php";
 </script>;
<?php
} else if (!$order) {
 $cart_id = $_SESSION['cart_id'];
 $cart_items = $cart->getAllProductsFromCart($cart_id);

 // Calculate total price
 $total = 0;
 foreach ($cart_items as $item) {
  $total += $item['price'] * $item['quantity'];
 }
} else {
?>
 <script>
  window.location.href = "orderTracking.php?id=" + <?php echo $order['id'] ?>;
 </script>

<?php

}
?>

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
      <tbody>
       <?php
       foreach ($cart_items as $item) {
        $images = json_decode($item['images']);
       ?>
        <tr id=<?php echo $item['id'] ?>>
         <td class="cart_product_img">
          <a href="#"><img src=<?php echo $images[0] ?> alt="Product" /></a>
         </td>
         <td class="cart_product_desc">
          <h5><?php echo $item['name'] ?></h5>
         </td>
         <td class="price">
          <span><?php echo $item['price'] ?></span>
         </td>
         <td class="qty">
          <div class="qty-btn d-flex">
           <p>Qty</p>
           <div class="quantity">
            <span style="margin-right: 4px" class="qty-minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value=<?php echo $item['quantity'] ?> />
            <span class="qty-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
           </div>
          </div>
         </td>
        </tr>
       <?php

       } ?>
      </tbody>
     </table>
    </div>
   </div>
   <div class="col-12 col-lg-4">
    <form class="cart-summary">
     <h5>Cart Total</h5>
     <ul class="summary-table">
      <li>
       <span>subtotal ($ US):</span>
       <span id="sub-total-price" class="number-separator">0</span>
      </li>
      <li><span>delivery ($ US):</span> <span>Free</span></li>
      <li>
       <span>total ($ US):</span> <span id="total-price" class="number-separator">0</span>
      </li>
     </ul>
     <div class="cart-btn mt-100">
      <a onclick="checkout()" class="btn amado-btn w-100">Checkout</a>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->