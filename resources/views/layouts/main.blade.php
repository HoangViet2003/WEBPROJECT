<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Title  -->
        <title>Amado - Furniture Ecommerce</title>

        <!-- Favicon  -->

        <link
            rel="icon"
            href="{{ asset('assets/img/core-img/favicon.ico') }}"
        />

        <!-- Core Style CSS -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/core-style.css') }}"
        />
        <!-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" /> -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/images-upload.css') }}"
        />

        <script
            src="{{ asset('assets/js/enterKeyDownPress.js') }}"
            defer
        ></script>
           <link rel="stylesheet" type="text/css" href="{{
                asset(
                    'assets/DataTables/DataTables-1.12.1/css/jquery.dataTables.min.css'
                )
            }}" />
        <link rel="stylesheet" type="text/css" href="{{
                asset(
                    'assets/DataTables/DataTables-1.12.1/css/dataTables.bootstrap.min.css'
                )
            }}" />
                    <link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/button.dataTables.min.css') }}" />
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </head>

    <body>
        <!-- Search Wrapper Area Start -->
        @php $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ?
        "https://" : "http://"; $url .= $_SERVER['HTTP_HOST'] .
        $_SERVER['REQUEST_URI']; $current_page = basename($url); @endphp

        <div class="search-wrapper section-padding-100">
            <div class="search-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-content">
                            <form name="searchInput" id="search-input">
                                <input
                                    type="search"
                                    id="search"
                                    placeholder="Type your keyword..."
                                />
                                <button type="submit">
                                    <img
                                        src="{{
                                            asset(
                                                'assets/img/core-img/search.png'
                                            )
                                        }}"
                                        alt=""
                                    />
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
                    <a href="/"
                        ><img
                            src="{{ asset('assets/img/core-img/logo.png') }}"
                            alt=""
                    /></a>
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
                    <a href="/"
                        ><img
                            src="{{ asset('assets/img/core-img/logo.png') }}"
                            alt=""
                    /></a>
                </div>
                <!-- Amado Nav -->
                <nav class="amado-nav">
                    <ul>
                        <li
                            class="@php if ($current_page == 'localhost:8000') : echo 'active'; else : echo ''; endif; @endphp"
                        >
                            <a href="/">Home</a>
                        </li>
                        <li
                            class="@php if ($current_page == `shop`) : echo 'active'; else : echo ''; endif; @endphp"
                        >
                            <a href="http://localhost:8000/shop/1">Shop</a>
                        </li>

                        <li
                            class="@php if ($current_page == 'profile') : echo 'active'; else : echo ''; endif; @endphp"
                            id="profile"
                        >
                            <a href="http://localhost:8000/profile"
                                >My profile</a
                            >
                        </li>

                        <li id="logout">
                            <a
                                href="http://localhost:8000/login"
                                onclick="logout();"
                                >Logout</a
                            >
                        </li>

                        <li
                            class="@php if ($current_page == 'login') : echo 'active'; else: echo ''; endif; @endphp"
                            id="login"
                        >
                            <a href="http://localhost:8000/login"
                                >Login / Signup</a
                            >
                        </li>
                    </ul>
                </nav>
                <div class="cart-fav-search mb-100">
                    <a href="http://localhost:8000/cart" class="cart-nav"
                        ><img
                            src="{{ asset('assets/img/core-img/cart.png') }}"
                            alt="" />
                        Cart
                        <span
                            id="cart-count"
                            class="badge badge-pill badge-warning"
                        ></span
                    ></a>
                    <a href="http://localhost:8000/order" class="order-nav"
                        ><img
                            src="{{ asset('assets/img/core-img/cart.png') }}"
                            alt="" />
                        Order
                        <span
                            id="cart-count"
                            class="badge badge-pill badge-warning"
                        ></span
                    ></a>
                    <a href="#" class="search-nav"
                        ><img
                            src="{{ asset('assets/img/core-img/search.png') }}"
                            alt=""
                        />
                        Search</a
                    >
                </div>
                <!-- Social Button -->
                <div class="social-info d-flex justify-content-between">
                    <a href="https://pin.it/31JHeBp" target="_blank"
                        ><i class="fa fa-pinterest" aria-hidden="true"></i
                    ></a>
                    <a
                        href="https://www.instagram.com/tuananhh.ngo/"
                        target="_blank"
                        ><i class="fa fa-instagram" aria-hidden="true"></i
                    ></a>
                    <a href="https://www.facebook.com/Nitieiii/" target="_blank"
                        ><i class="fa fa-facebook" aria-hidden="true"></i
                    ></a>
                    <a
                        href="https://twitter.com/NGOTUAN18597776"
                        target="_blank"
                        ><i class="fa fa-twitter" aria-hidden="true"></i
                    ></a>
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
                                <input
                                    type="email"
                                    name="email"
                                    class="nl-email"
                                    placeholder="Your E-mail"
                                />
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
                                <a href="index.php"
                                    ><img
                                        src="{{
                                            asset(
                                                'assets/img/core-img/logo2.png'
                                            )
                                        }}"
                                        alt=""
                                /></a>
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
                                <nav
                                    class="navbar navbar-expand-lg justify-content-end"
                                >
                                    <button
                                        class="navbar-toggler"
                                        type="button"
                                        data-toggle="collapse"
                                        data-target="#footerNavContent"
                                        aria-controls="footerNavContent"
                                        aria-expanded="false"
                                        aria-label="Toggle navigation"
                                    >
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <div
                                        class="collapse navbar-collapse"
                                        id="footerNavContent"
                                    >
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/"
                                                    >Home</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    href="./shop"
                                                    >Shop</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    href="./cart"
                                                    >Cart</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    href="./checkout"
                                                    >Checkout</a
                                                >
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

        <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
        <script src="{{
                asset('assets/js/jquery/jquery-2.2.4.min.js')
            }}"></script>
        <!-- Popper js -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        /
        <!-- Plugins js -->
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <!-- Active js -->
        <script src="{{ asset('assets/js/active.js') }}"></script>

        <script src="{{
                asset('assets/DataTables/datatables.min.js')
            }}"></script>

        <script src="{{ asset('assets/js/access_token.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

          <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $("#myTable")
                .removeAttr("width")
                .DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                    dom: "Bfrtip",
                    buttons: ["excel", "pdf"],
                    order: [],

                    columnDefs: [{
                            width: 80,
                            targets: 0,
                        },
                        {
                            className: "dt-center",
                            targets: "_all",
                        },
                        {
                            className: "dt-head-center",
                            targets: "_all",
                        },
                    ],
                    fixedColumns: true,
                });

            $("#myTable tbody").on("dblclick", "tr", function() {
                var data = table.row(this).data();
                // Get the path name of the current page
                var path = window.location.pathname;
                // Get the last part of the path name
                var page = path.split("/").pop();

                if (data) {
                    // Redirect to details page
                    if (page == "order") {
                        window.location.href =
                            "order/" + data[0];
                    } else if (page == "order-admin") {
                        window.location.href = "order-detail-admin/" + data[0];
                    } else if (page == "users-admin") {
                        window.location.href = "user-detail-admin/" + data[0];
                    }else if(page == "cart"){
                        window.location.href = "cart/" + data[0];
                    }else if (page == "indexAdmin.php") {
                        window.location.href =
                            "order-detail-admin.php?id=" + data[0];
                    }
                } else {
                    console.log("No data available in row");
                }
            });
        })
    </script>
    </body>
</html>
