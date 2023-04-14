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
  <link rel="icon" href="img/core-img/favicon.ico" />

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/core-style.css')}}" />
  <!-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" /> -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/DataTables-1.12.1/css/jquery.dataTables.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/DataTables-1.12.1/css/dataTables.bootstrap.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/button.dataTables.min.css')}}" />

  <script src="{{ asset('assets/js/enterKeyDownPress.js') }}" defer></script>

  {{-- <!-- <?php
  session_start();
  require_once("./database/functions.php");

  // Check if user is logged in
  if (!isset($_SESSION["useremail"])) {
    header("Location: ./login.php");
    exit();
  }

  if (!isset($_SESSION["is_admin"])) {
    echo "<script>alert('You are not an admin!');</script>";
    header("Location: ./login.php");
    exit();
  }
  ?> --> --}}
</head>

<body>
  <!-- Search Wrapper Area Start -->

  {{-- <?php
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
  else
    $url = "http://";
  // Append the host(domain name, ip) to the URL.   
  $url .= $_SERVER['HTTP_HOST'];

  // Append the requested resource location to the URL   
  $url .= $_SERVER['REQUEST_URI'];

  $current_page = basename($url);

  ?> --}}
  <!-- <div class="search-wrapper section-padding-100">
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
        <img src="img/core-img/search.png" alt="" />
       </button>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div> -->
  <!-- Search Wrapper Area End -->

  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">
    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <div class="amado-navbar-brand">
      <a href="index.php"><img src="{{asset('assets/img/core-img/logo.png')}}" alt="" /></a>
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
        <a href="indexAdmin.php"><img src="{{asset('assets/img/core-img/logo.png')}}" alt="" /></a>
      </div>
      <!-- Amado Nav -->
      <nav class="amado-nav">
        <ul>
          <li 
            class=""
                      ><a href="">Dashboard</a></li>
          <li 
            class="""
                      ><a href="">Products</a></li>
          <li 
            class="""
                      ><a href="">Users</a></li>
          {{-- <!-- <?php
          if (isset($_SESSION['useremail'])) : ?>
            <li class="<?php if ($current_page == 'profileAdmin.php') : echo 'active';
                        else : echo '';
                        endif; ?> "><a href="profileAdmin.php">My profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          <?php endif; ?> --> --}}
        </ul>
      </nav>
      <!-- Button Group -->
      <!-- <div class="amado-btn-group mt-30 mb-100">
          <a href="#" class="btn amado-btn mb-15">%Discount%</a>
          <a href="#" class="btn amado-btn active">New this week</a>
        </div> -->

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


<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix"></footer>
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
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="checkout.php">Checkout</a>
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
<div class="modal">
  <!-- Place at bottom of page -->
</div>
<!-- ##### Footer Area End ##### -->

<!-- axios js -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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

<script src="{{asset('assets/js/api/Admin/productsAdmin.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

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