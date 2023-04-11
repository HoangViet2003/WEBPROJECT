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
  <link rel="stylesheet" href="css/core-style.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" type="text/css" href="./DataTables/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="./DataTables/button.dataTables.min.css" />
  <link rel="stylesheet" type="text/css" href="./DataTables/jquery.dataTables.min.css" />

  <script src="../js/enterKeyDownPress.js" defer></script>

  <?php
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
  ?>
</head>

<body>
  <!-- Search Wrapper Area Start -->

  <?php
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
  else
    $url = "http://";
  // Append the host(domain name, ip) to the URL.   
  $url .= $_SERVER['HTTP_HOST'];

  // Append the requested resource location to the URL   
  $url .= $_SERVER['REQUEST_URI'];

  $current_page = basename($url);

  ?>
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
        <a href="indexAdmin.php"><img src="img/core-img/logo.png" alt="" /></a>
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
        <a href="indexAdmin.php"><img src="img/core-img/logo.png" alt="" /></a>
      </div>
      <!-- Amado Nav -->
      <nav class="amado-nav">
        <ul>
          <li class="<?php if ($current_page == 'indexAdmin.php') : echo 'active';
                      else : echo '';
                      endif; ?> "><a href="indexAdmin.php">Dashboard</a></li>
          <li class="<?php if ($current_page == 'productsAdmin.php') : echo 'active';
                      else : echo '';
                      endif; ?> "><a href="productsAdmin.php">Products</a></li>
          <li class="<?php if ($current_page == 'usersAdmin.php') : echo 'active';
                      else : echo '';
                      endif; ?> "><a href="usersAdmin.php">Users</a></li>
          <?php
          if (isset($_SESSION['useremail'])) : ?>
            <li class="<?php if ($current_page == 'profileAdmin.php') : echo 'active';
                        else : echo '';
                        endif; ?> "><a href="profileAdmin.php">My profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          <?php endif; ?>
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