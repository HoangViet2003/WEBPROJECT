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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/images-upload.css') }}" />

    <script src="{{ asset('assets/js/enterKeyDownPress.js') }}" defer></script>
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
                <a href="index.php"><img src="{{asset('assets/img/core-img/logo.png')}}" alt="" /></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li {{-- class="<?php if ($current_page == 'shop.php') : echo 'active';
                                    else : echo '';
                                    endif; ?>" --}}>
                        <a href="shop.php">Shop</a>
                    </li>
                    <!-- <li><a href="product-details.html">Product</a></li> -->
                    <li {{-- class="<?php if ($current_page == 'cart.php') : echo 'active';
                                    else : echo '';
                                    endif; ?>" --}}>
                        <a href="cart.php">Cart</a>
                    </li>

                </ul>
            </nav>
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="{{asset('assets/img/core-img/cart.png')}}" alt="" /> Cart
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
    </div>
</body>

</html>