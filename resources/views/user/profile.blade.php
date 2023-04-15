@extends('layouts.main') @section('main-content')

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Profile</h2>
                </div>

                <div class="row" style="height: 100%">
                    <div class="col-md-3">
                        <div href="#" class="d-inline">
                            <img
                                src="{{
                                    asset('assets/img/product-img/product1.jpg')
                                }}"
                                width="130px"
                                style="margin: 0; border-radius: 50%"
                            /><br />
                            <!-- <p class="pl-2 mt-2">
                                <a
                                    type="file"
                                    class="btn"
                                    style="color: #8f9096; font-weight: 600"
                                    >Edit Picture</a
                                >
                            </p> -->
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div>
                            <form action="" method="post" id="profile-form">
                                <!-- <div class="form-group">
                                    <label for="fullName"
                                        >ID (cannot change this field)</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="id"
                                        readonly="readonly"
                                        value="  "
                                        placeholder="First Name"
                                        required
                                    />
                                </div> -->
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="fullname"
                                        id="full_name"
                                        value=""
                                        placeholder="First Name"
                                        required
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        value=""
                                    />
                                </div>
                                <!-- <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        id="pass"
                                        disabled
                                    />
                                </div> -->
                                <div class="row">
                                    <div class="row mt-5">
                                        <div class="col">
                                            <button
                                                type="submit"
                                                class="btn amado-btn"
                                            >
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/api/User/profile.js') }}"></script>
<!-- ##### Main Content Wrapper End ##### -->
@stop
