@extends('layouts.mainAdmin') @section('main-content')
<!-- Product Catagories Area Start -->

<div class="dashboard-table-area section-padding-100">
    <div>
        <div class="cart-title mt-50">
            <h2>Users Dashboard</h2>
        </div>

        <table class="stripe row-border order-column" id="myTable" style="width: 100%">
            <thead>
                <tr>
                    <th>User id</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody id="tables-user"></tbody>
        </table>

    </div>
</div>


<!-- User Catagories Area End -->
<script src="{{ asset('assets/js/api/Admin/usersAdmin.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
@endsection