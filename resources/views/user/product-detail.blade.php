@extends('layouts.main')
@section('main-content')
<!-- Product Catagories Area Start -->

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

            <div class="col-12 col-lg-7" id="product-img">
                {{-- <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">

                            <li class=" 'active'
                                        
                                        " data-target="#product_details_slider" data-slide-to="" style="
                  background-image: url()">
                            </li>

                        </ol>
                        <div class="carousel-inner">

                            <div class="carousel-item active 
                                            
                                           ">
                                <a class="gallery_img" href="">
                                    <img class="d-block w-100" src="{{asset('assets/img/product-img/product1.jpg')}}" alt="Product slide" />
                </a>
            </div>

        </div>
    </div>
</div> --}}
</div>


<div class="col-12 col-lg-5">
    <div class="single_product_desc" id="product-detail">
        <!-- Product Meta Data -->
        {{-- <div class="product-meta-data">
            <div class="line"></div>
            <p class="product-price">$ price</p>
            <a href="product-details.html">
                <h6>name</h6>
            </a>
            <!-- Ratings & Review -->
            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">


            </div>
            <div class="review">
                <a href="#">Write A Review</a>
            </div>
        </div>
        <!-- Avaiable -->
        <i class="fa fa-circle"></i>

        </p>
        <div class="short_overview my-5">
            <p></p>
            descfkerlmferklfmerkflmerlkfmlerkmflkermfrkefmerkflmerlfmrelkfmerflkermflkermfrkmflerfmerlfmerlfmkm
            </p>
        </div> --}}
    </div>


    <form action="" class="cart clearfix" method="post">
        <div class="cart-btn d-flex mb-50">
            <p>Qty</p>
            <div class="quantity">
            </div>
        </div>



        <button src=type="submit" name="addtocart" method="POST" class="btn amado-btn">
            Add to cart
        </button>

        <button type="button" name="addtocart" class="btn" disabled>
            Out of order
        </button>

    </form>

</div>

</div>
</div>
</div>
</div>
</div>
<!-- Product Details Area End -->
</div>
<script src="{{ asset('assets/js/api/User/productDetail.js') }}"></script>

@stop