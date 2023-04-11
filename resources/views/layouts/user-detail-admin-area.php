<?php
// User need to log in to view this page
if (!isset($_SESSION['useremail']) || !isset($_SESSION['is_admin'])) {
 header('Location: login.php');
 exit();
}

// Get user details from db
if ($_GET['id']) {
 $user_details = $user->getUserById($_GET['id']);
}

if ($_POST["id"]) {
 $id = $_POST["id"];
 $email = $_POST["email"];
 $full_name = $_POST["user_name"];
 $role = $_POST["isAdmin"];
 $result = $user->updateUser($id, $email, $full_name, $role);

 if ($result) {
  echo "<script>alert('user's information updated successfully!');</script>";
  echo "<script>window.location.href='user-detail-admin.php?id=$id';</script>";
 } else {
  echo "<script>alert('Failed to update user details!');</script>";
 }
}
?>

<div class="cart-table-area section-padding-100">
 <div class="container-fluid">
  <div class="row">
   <div class="col-12 col-lg-8">
    <div class="cart-title mt-50">
     <h2><?php echo $user_details ? "Details" : "New user" ?></h2>
    </div>

    <div class="col-md-12">

     <form action="" method="post">
      <div class="form-group">
       <?php
       if ($user_details["id"]) {
        echo "<label for='id'>ID (cannot change this field)</label>";
        echo "<input type='text' class='form-control' id='id' name='id' value='" . $user_details["id"] . "' readonly>";
       }
       ?>
      </div>
      <div class="form-group">
       <label for="fullName">Fullname</label>
       <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $user_details["full_name"] ?>" required />
      </div>
      <div class="row">
       <div class="col">
        <div class="form-group">
         <label for="price">Email</label>
         <input type="email" class="form-control" name="email" id="email" value="<?php echo $user_details["email"] ?>" required />
        </div>
       </div>
       <div class="col">
        <div class="form-group">
         <label for="isAdmin">Role</label>
         <select class="" id="admin" name="isAdmin" style="float: none !important">
          <?php
          $array_options = ["Admin", "User"];

          if ($user_details["is_admin"]) {
           echo "<option value='1' selected>Admin</option>";
           echo "<option value='0'>User</option>";
          } else {
           echo "<option value='1'>Admin</option>";
           echo "<option value='0' selected>User</option>";
          }

          ?>
         </select>
        </div>
       </div>
      </div>

      <div class="row">
       <div class="row mt-5">
        <div class="col">
         <button type="submit" class="btn amado-btn">
          <?php echo $user_details ? "Save changes" : "Create" ?>
         </button>
        </div>
        <?php
        if ($user_details) {
        ?>
         <div class="col">
          <a class="btn amado-btn active" name="delete" onclick="deleteUser(<?php echo $user_details["id"]; ?>)" style="color: white">
           Delete
          </a>
         </div>

        <?php } ?>
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