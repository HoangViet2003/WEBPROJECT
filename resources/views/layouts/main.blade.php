<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title  -->
  <title>Amado - Furniture Ecommerce</title>

  <!-- Favicon  -->
  <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }}" />

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/core-style.css') }}" />
  <!-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" /> -->
  <link rel="stylesheet" href="{{ asset('assets/css/images-upload.css') }}" />

  
  <script src="{{ asset('assets/js/enterKeyDownPress.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
  <!-- Search Wrapper Area Start -->
  <div class="search-wrapper section-padding-100">
    <div class="search-close">
      <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="search-content">
            <form action="shop.php" method="get" name="searchInput">
              <input type="search" name="search" id="search" placeholder="Type your keyword..." />
              <button type="submit">
                <img src="{{asset('assets/img/core-img/search.png')}}" alt="" />
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Search Wrapper Area End -->

  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">
    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <div class="amado-navbar-brand">
        <a href="/"><img src="{{asset('assets/img/core-img/logo.png')}}" alt="" /></a>
      </div>
      <!-- Navbar Toggler -->
      <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
      </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
      <!-- Close Icon -->
      <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
      </div>
      <!-- Logo -->
      <div class="logo">
        <a href="/"><img src="{{asset('assets/img/core-img/logo.png')}}" alt="" /></a>
      </div>
      <!-- Amado Nav -->
      <nav class="amado-nav">
        <ul>
          <li>
            <a href="/">Home</a>
          </li>
          <li {{-- class="<?php if ($current_page == 'shop.php') : echo 'active';
                          else : echo '';
                          endif; ?>" --}}>
            <a href="./shop">Shop</a>
          </li>
          <!-- <li><a href="product-details.html">Product</a></li> -->
          <li {{-- class="<?php if ($current_page == 'cart.php') : echo 'active';
                          else : echo '';
                          endif; ?>" --}}>
            <a href="./cart">Cart</a>
          </li>

        </ul>
      </nav>
      <div class="cart-fav-search mb-100">
        <a href="./cart" class="cart-nav"><img src="{{asset('assets/img/core-img/cart.png')}}" alt="" /> Cart
          <a href="#" class="search-nav"><img src="{{asset('assets/img/core-img/search.png')}}" alt="" /> Search</a>
      </div>
      <!-- Social Button -->
      <div class="social-info d-flex justify-content-between">
        <a href="https://pin.it/31JHeBp" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/tuananhh.ngo/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="https://www.facebook.com/Nitieiii/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="https://twitter.com/NGOTUAN18597776" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      </div>
    </header>
    <!-- Header Area End -->

    @yield('main-content')

  </div>

  <!-- Newsletter section -->
  <section class="newsletter-area section-padding-100-0">
    <div class="container">
      <div class="row align-items-center">
        <!-- Newsletter Text -->
        <div class="col-12 col-lg-6 col-xl-7">
          <div class="newsletter-text mb-100">
            <h2>Subscribe for a <span>25% Discount</span></h2>
          </div>
        </div>
        <!-- Newsletter Form -->
        <div class="col-12 col-lg-6 col-xl-5">
          <div class="newsletter-form mb-100">
            <form action="#" method="post">
              <input type="email" name="email" class="nl-email" placeholder="Your E-mail" />
              <input type="submit" value="Subscribe" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer_area clearfix">

    <div class="container">
      <div class="row align-items-center">
        <!-- Single Widget Area -->
        <div class="col-12 col-lg-4">
          <div class="single_widget_area">
            <!-- Logo -->
            <div class="footer-logo mr-50">
              <a href="index.php"><img src="{{ asset('assets/img/core-img/logo2.png') }}" alt="" /></a>
            </div>
            <p class="copywrite">
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved
            </p>
          </div>
        </div>
        <!-- Single Widget Area -->
        <div class="col-12 col-lg-8">
          <div class="single_widget_area">
            <!-- Footer Menu -->
            <div class="footer_menu">
              <nav class="navbar navbar-expand-lg justify-content-end">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="footerNavContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./shop">Shop</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./cart">Cart</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./checkout">Checkout</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  </footer>
  <div class="modal">
    <!-- Place at bottom of page -->
  </div>
  <!-- ##### Footer Area End ##### -->

  <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
  <script src="{{ asset('assets/js/jquery/jquery-2.2.4.min.js') }}"></script>
  <!-- Popper js -->
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <!-- Bootstrap js -->
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> /
  <!-- Plugins js -->
  <script src="{{ asset('assets/js/plugins.js') }}"></script>
  <!-- Active js -->
  <script src="{{ asset('assets/js/active.js') }}"></script>

  <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>

  <script src="{{ asset('assets/js/product-details.js') }}"></script>

  <script src="{{ asset('assets/js/user.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script>
    $(document).ready(function() {
      var table = $('#myTable').removeAttr('width').DataTable({
        scrollY: "300px",
        scrollX: true,
        scrollCollapse: true,
        // paging: true,
        dom: 'Bfrtip',
        buttons: [
          'excel', 'pdf',
        ],

        columnDefs: [{
          width: 80,
          targets: 0
        }, {
          "className": "dt-center",
          "targets": "_all"
        }, {
          className: "dt-head-center",
          targets: "_all"
        }, ],
        fixedColumns: true
      });


      $('#myTable tbody').on('dblclick', 'tr', function() {
        var data = table.row(this).data();

        // Get the path name of the current page
        var path = window.location.pathname;
        // Get the last part of the path name
        var page = path.split("/").pop();

        // Redirect to details page
        if (page == "productsAdmin.php") {
          window.location.href = "product-details-admin.php?id=" + data[0];
        } else if (page == "ordersAdmin.php") {
          window.location.href = "orderDetails.php?id=" + data[0];
        } else if (page == "usersAdmin.php") {
          window.location.href = "user-detail-admin.php?id=" + data[0];
        } else if (page == "indexAdmin.php") {
          window.location.href = "order-detail-admin.php?id=" + data[0];
        }
      });
    });
  </script>
</body>

</html>