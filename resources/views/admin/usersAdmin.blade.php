@extends('layouts.mainAdmin') 
@section('main-content')
<!-- Product Catagories Area Start -->
{{-- <?php
// get all orders
$users = $user->getAllUsers();

?> --}}
<div class="dashboard-table-area section-padding-100">
  <div>
    <div>
      <div>
        <div class="cart-title mt-50">
          <h2>Users Dashboard</h2>
        </div>

        <!-- <div class="row"> -->
        <table class="stripe row-border order-column" id="myTable" style="width: 100%">
          <thead>
            <tr>
              <th >User id</th>
              <th >Fullname</th>
              <th>Email</th>
              <th>Created at</th>
            </tr>
          </thead>
          <tbody id="tables-user">
            {{-- <?php
            if ($users) {
              foreach ($users as $user) {
            ?> --}}
                {{-- <tr>
                  <td>id</td>
                  <td >fullname</td>
                  <td>email</td>
                  <td>create at</td>
                </tr> --}}
            {{-- <?php
              }
            }
            ?> --}}
          </tbody>
        </table>
        <!-- </div> -->

      </div>

    </div>
  </div>
</div>
</div>
<!-- User Catagories Area End -->

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;
@stop