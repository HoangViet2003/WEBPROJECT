<?php
$item_id = $_GET['item_id'];
if (isset($item_id)) {
  $result = $product->getProduct($item_id);
  $images = json_decode($result['images']);
}

if ($_POST['quantity']) {
  $quantity = (int)$_POST['quantity'];
  if ($quantity > (int)$result['quantity']) {
?>
    <script>
      alert("Chosen quantity exceeds the current products available in store!");
      window.location.href = "product-details.php?item_id=<?php echo $item_id ?>";
    </script>;
    <?php
  } else {
    if (!isset($_SESSION['useremail'])) {
      // Store the current product url in session
      $_SESSION['product_url'] = $_SERVER['REQUEST_URI'];

    ?>
      <script>
        alert("Please login to add item to cart!");
        window.location.href = "login.php";
      </script>;
      <?php
    } else {
      if (!isset($_SESSION['cart_id'])) {
        $cart->createCart($result['user_id']);
        $_SESSION['cart_id'] = $cart->getCart($result['user_id']);
      }
      // check if product already exists in cart database
      $checkDuplicate = $cart->checkDuplicate($_SESSION['cart_id'], $item_id);

      if (!$checkDuplicate) {
        $cart->createCartItem($_SESSION['cart_id'], $item_id, $quantity);
      ?>
        <script>
          alert("Item added to cart!");
          window.location.href = "product-details.php?item_id=<?php echo $item_id ?>";
        </script>;
      <?php
      } else {
      ?>
        <script>
          alert("Item already exists in cart!");
          window.location.href = "product-details.php?item_id=<?php echo $item_id ?>";
        </script>;
      <?php
        exit();
      }

      ?>
<?php
    }
  }
}
?>

<div class="single-product-area section-padding-100 clearfix">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mt-50">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Furniture</a></li> -->
            <li class="breadcrumb-item"><a href="#"><?php echo $result['category'] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              <?php echo $result['name'] ?? "Unknown" ?>
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-7">
        <div class="single_product_thumb">
          <div id="product_details_slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php
              $images = json_decode($result['images']);

              for ($i = 0; $i < count($images); $i++) {
              ?>
                <li class="<?php if ($i == 0) : echo 'active';
                            else : echo '';
                            endif; ?>" data-target="#product_details_slider" data-slide-to="<?php echo $i ?>" style="
                  background-image: url(<?php echo $images[$i] ?>);
                "></li>
              <?php } ?>
            </ol>
            <div class="carousel-inner">
              <?php
              $images = json_decode($result['images']);

              for ($i = 0; $i < count($images); $i++) {
              ?>
                <div class="carousel-item <?php if ($i == 0) : echo 'active';
                                          else : echo '';
                                          endif; ?>">
                  <a class="gallery_img" href="<?php echo $images[$i] ?>">
                    <img class="d-block w-100" src="<?php echo $images[$i] ?>" alt="Product slide" />
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5">
        <div class="single_product_desc">
          <!-- Product Meta Data -->
          <div class="product-meta-data">
            <div class="line"></div>
            <p class="product-price">$ <?php echo $result['price'] ?? "Unknown" ?></p>
            <a href="product-details.html">
              <h6><?php echo $result['name'] ?? "Unknown" ?></h6>
            </a>
            <!-- Ratings & Review -->
            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
              <div class="ratings">
                <?php
                $rating = $result['rating'];
                for ($i = 0; $i < $rating; $i++) { ?>
                  <i class="fa fa-star" aria-hidden="true"></i>

                <?php } ?>

                <?php
                for ($i = 0; $i < 5 - $rating; $i++) {
                ?>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                <?php } ?>
              </div>
              <div class="review">
                <a href="#">Write A Review</a>
              </div>
            </div>
            <!-- Avaiable -->
            <p class=<?php
                      if ($result['status'] == 'in_stock') :
                        echo 'avaibility';
                      elseif ($result['status'] == 'out_of_stock') :
                        echo 'outstock';
                      else :
                        echo 'runninglow';
                      endif ?>>
              <i class="fa fa-circle"></i>
              <?php
              if ($result['status'] == 'in_stock') :
                echo 'In stock - ' . $result['quantity'] . " products available";
              elseif ($result['status'] == 'out_of_stock') :
                echo 'Out of stock';
              else :
                echo 'Running low - ' . $result['quantity'] . " products available";
              endif ?>
            </p>
          </div>

          <div class="short_overview my-5">
            <p>
              <?php echo $result['description'] ?? "Unknown" ?>
            </p>
          </div>

          <!-- Add to Cart Form -->
          <form action="" class="cart clearfix" method="post">
            <?php
            if ($result['status'] !== 'out_of_stock') {
            ?>
              <div class="cart-btn d-flex mb-50">
                <p>Qty</p>
                <div class="quantity">
                  <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                  <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1" />
                  <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                </div>
              </div>

            <?php
            }
            ?>
            <?php
            if ($result['status'] !== 'out_of_stock') {
            ?>
              <button type="submit" name="addtocart" class="btn amado-btn">
                Add to cart
              </button>
            <?php } else { ?>
              <button type="button" name="addtocart" class="btn" disabled>
                Out of order
              </button>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product Details Area End -->
</div>