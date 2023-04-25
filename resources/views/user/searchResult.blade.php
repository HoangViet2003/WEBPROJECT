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
    <script src="{{ asset('assets/js/api/User/productSearch.js') }}" defer></script>
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
