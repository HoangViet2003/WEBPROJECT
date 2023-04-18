@extends('layouts.mainAdmin')
@section('main-content')

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="cart-title mt-50">
          {{-- <!-- <h2><?php echo $user_details ? "Details" : "New user" ?></h2> --> --}}
          Details
        </div>

        <div class="col-md-12">

          <form action="" id="userform">
            <div class="form-group">
              {{-- <!-- <?php
                        if ($user_details["id"]) {
                          echo "<label for='id'>ID (cannot change this field)</label>";
                          echo "<input type='text' class='form-control' id='id' name='id' value='" . $user_details["id"] . "' readonly>";
                        }
                        ?> --> --}}
            </div>
            <div class="form-group">
              <label for="fullName">Fullname</label>
              <input type="text" class="form-control" name="user_name" id="user_name" required />
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="price">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="" required />
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="isAdmin">Role</label>
                  <select id="admin">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                  </select>
                  </input>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="row mt-5">
                <div class="col">
                  <button type="submit" class="btn amado-btn">
                    Save change
                  </button>
                </div>
                <div class="col">
                  <a class="btn amado-btn active" name="delete" onclick="deleteUser()" style="color: white">
                    Delete
                  </a>
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
</div>

<!-- ##### Main Content Wrapper End ##### -->
@endsection
<script src="{{ asset('assets/js/api/Admin/userDetail.js') }}" defer></script>