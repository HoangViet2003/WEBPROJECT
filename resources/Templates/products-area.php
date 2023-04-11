<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
 <div class="amado-pro-catagory clearfix">

  <?php
  $result = $product->searchProducts("chair", "all", 10, 1000);
  foreach ($product->getData() as $item) :
   $images = json_decode($item['images']);
  ?>
   <!-- Single Catagory -->
   <div class="single-products-catagory clearfix">
    <a href="<?php printf('%s?item_id=%s', 'product-details.php',  $item['id']); ?>">
     <img src="<?php echo $images[0] ?? "../img/product-img/product1.jpg" ?>" alt="" />
     <!-- Hover Content -->
     <div class="hover-content">
      <div class="line"></div>
      <p>From $<?php echo $item['price'] ?? "Unknown" ?></p>
      <h4><?php echo $item['name'] ?? "Unknown" ?></h4>
     </div>
    </a>
   </div>

  <?php endforeach; ?>
 </div>
</div>
<!-- Product Catagories Area End -->
</div>