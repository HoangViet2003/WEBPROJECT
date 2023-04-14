@extends('layouts.mainAdmin')
@section('main-content')
<!-- Product Catagories Area Start -->
{{--<?php
// get all orders
$products = $product->getDataWithoutLimit();

?>--}}
<div class="dashboard-table-area section-padding-100">
  <div>
    <div>
      <div>
        <div class="cart-title mt-50">
          <h2>Products Dashboard</h2>
        </div>

        <div style="display: flex; justify-content: end">
          <button class="btn" style="background-color: #fbb710; color: white; margin-bottom: 15px" onclick="location.href='product-details-admin.php'">Add product</button>
        </div>

        {{-- <div class="row">  --}}
        <table class="stripe row-border order-column" id="myTable" style="width: 100%">
          <thead>
            <tr>
              <th>Product id</th>
              <th>Product name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody id="tables-product">
            
                {{-- <tr>
                  <td style="width: auto">prd id</td>
                  <td>prd name</td>
                  <td>prd category</td>
                  <td>prd price</td>
                  <td>prd quantity</td>
                </tr> --}}
           
          </tbody>
        </table>
        {{-- </div> --}}

      </div>

    </div>
  </div>
</div>
</div>
<!-- Product Catagories Area End -->

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;

@stop
<script src="{{asset('assets/js/api/Admin/productsAdmin.js')}}"></script>

