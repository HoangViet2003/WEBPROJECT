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

@stop
