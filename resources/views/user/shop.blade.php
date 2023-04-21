@extends('layouts.main')
@section('main-content')

<div class="amado_product_area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                    <!-- Total Products -->
                    <div class="total-products" id="total-product">
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id='product-area'>
            <!-- Single Product Area -->

            {{-- <div class="col-6 col-sm-4 col-md-6 col-xl-4">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="{{asset('assets/img/product-img/product2.jpg')}}" alt="" style="height: 440px" />
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="{{asset('assets/img/product-img/product1.jpg')}}" style="height: 440px" />
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">$500</p>
                            <a href="./product-detail">
                                <h6>Product 1</h6>
                            </a>
                        </div>
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">

                            </div>
                            <div class="cart">
                                <a href="cart" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{asset('assets/img/core-img/cart.png')}}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div> --}}


        </div>

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end mt-50" id="pagination-link">
                       
                         
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
<script src="{{ asset('assets/js/api/User/shop.js') }}"></script>
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
@stop