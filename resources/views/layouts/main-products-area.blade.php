{{--<?php
     if ($_GET['page']) {
          $page = $_GET['page'];
     } else {
          $page = 1;
     }

     if ($_GET['search']) {
          $search = $_GET['search'];
          $result = $product->searchProducts($search);
     } else {
          $result = $product->searchProducts();
     }

     $start = ($page - 1) * 10 == 0 ? 1 : ($page - 1) * 10;
     $end = $page * 10;

     if (count($result) < $end) {
          $end = count($result);
     }

     $url .= $_SERVER['REQUEST_URI'];
     $url_components = parse_url($url);

     parse_str($url_components['query'], $params);
     ?>--}}

<div class="amado_product_area section-padding-100">
     <div class="container-fluid">
          <div class="row">
               <div class="col-12">
                    <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                         <!-- Total Products -->
                         <div class="total-products">
                              {{-- <?php
                                   if ($result == 0) {
                                        echo "<p>No results found</p>";
                                   } else {
                                        echo "<p>Showing " . $start . " - " . $end . " of " . count($result) . " results</p>";
                                   }
                                   ?> --}}
                         </div>
                    </div>
               </div>
          </div>

          <div class="row">
               <!-- Single Product Area -->

               <div class="col-6 col-sm-4 col-md-6 col-xl-4">
                    <div class="single-product-wrapper">
                         <!-- Product Image -->
                         <div class="product-img">
                              <img src="{{asset('assets/img/product-img/product2.png')}}" alt="" style="height: 440px" />
                              <!-- Hover Thumb -->
                              <img class="hover-img" src="{{asset('assets/img/product-img/product1.png')}}" style="height: 440px" />
                         </div>

                         <!-- Product Description -->
                         <div class="product-description d-flex align-items-center justify-content-between">
                              <!-- Product Meta Data -->
                              <div class="product-meta-data">
                                   <div class="line"></div>
                                   <p class="product-price">$500</p>
                                   <a href="">
                                        <h6>Product 1</h6>
                                   </a>
                              </div>
                              <!-- Ratings & Cart -->
                              <div class="ratings-cart text-right">
                                   <div class="ratings">

                                   </div>
                                   <div class="cart">
                                        <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt="" /></a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>


          </div>

          <div class="row">
               <div class="col-12">
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                         <ul class="pagination justify-content-end mt-50">
                              {{-- <?php
                              $total_pages = ceil(count($result) / 10);
                              for ($i = 1; $i <= $total_pages; $i++) {
                              ?>
                                   <li class="page-item <?php
                                                            if ($i == $page) {
                                                                 echo 'active';
                                                            }
                                                            ?>">
                                        <a class="page-link" href="<?php printf('%s?page=%s', 'shop.php',  $i) ?>">
                                             <?php echo $i ?></a>
                                   </li>
                              <?php
                              }
                              ?> --}}
                         </ul>
                    </nav>
               </div>
          </div>
     </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;
<script>
     $(function() {
          $("#categories-options li a").on("click", function() {
               $('#categories-options li .selected').removeClass('selected');
               $(this).addClass("selected");

               var selected = $(this).text();

               $.ajax({
                    type: "POST",
                    url: 'shop.php',
                    data: {
                         options: selected
                    }, // name of the post variable ($_POST['id'])
                    success: function(data) {
                         console.log('successfully posted data! response body: ' + data);
                    }
               });
          });
     });
</script>