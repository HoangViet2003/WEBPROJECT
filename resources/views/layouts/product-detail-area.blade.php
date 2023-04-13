
<div class="single-product-area section-padding-100 clearfix">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mt-50">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Furniture</a></li> -->
            <li class="breadcrumb-item"><a href="#">category</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              name ?? unknown
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
              {{-- <?php
              $images = json_decode($result['images']);

              for ($i = 0; $i < count($images); $i++) {
              ?>
                <li class="<?php if ($i == 0) : echo 'active';
                            else : echo '';
                            endif; ?>" data-target="#product_details_slider" data-slide-to="<?php echo $i ?>" style="
                  background-image: url(<?php echo $images[$i] ?>);
                "></li>
              <?php } ?> --}}
            </ol>
            <div class="carousel-inner">
             {{--<?php
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
              <?php } ?>--}} 
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5">
        <div class="single_product_desc">
          <!-- Product Meta Data -->
          <div class="product-meta-data">
            <div class="line"></div>
            <p class="product-price">$ price</p>
            <a href="product-details.html">
              <h6>name</h6>
            </a>
            <!-- Ratings & Review -->
            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
              <div class="ratings">
                {{-- <?php
                $rating = $result['rating'];
                for ($i = 0; $i < $rating; $i++) { ?>
                  <i class="fa fa-star" aria-hidden="true"></i>

                <?php } ?>

                <?php
                for ($i = 0; $i < 5 - $rating; $i++) {
                ?>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                <?php } ?> --}}
              </div>
              <div class="review">
                <a href="#">Write A Review</a>
              </div>
            </div>
            <!-- Avaiable -->
            {{--<p class=<?php
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
              endif ?>--}} 
            </p>
          </div>

          <div class="short_overview my-5">
            <p>
              {{--<?php echo $result['description'] ?? "Unknown" ?>--}} 
              description
            </p>
          </div>

          <!-- Add to Cart Form -->
          <form action="" class="cart clearfix" method="post">
              <div class="cart-btn d-flex mb-50">
                <p>Qty</p>
                <div class="quantity">
                </div>
              </div>

          
              {{--<?php
            if ($result['status'] !== 'out_of_stock') {
            ?>--}} 
              <button type="submit" name="addtocart" class="btn amado-btn">
                Add to cart
              </button>
            {{--<?php } else { ?>--}} 
              <button type="button" name="addtocart" class="btn" disabled>
                Out of order
              </button>
            {{--<?php } ?>--}} 
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product Details Area End -->
</div>