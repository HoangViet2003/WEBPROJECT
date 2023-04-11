<!-- Product Catagories Area Start -->
<?php
// get all orders
$users = $user->getAllUsers();

?>
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
              <th>User id</th>
              <th>Fullname</th>
              <th>Email</th>
              <th>Created at</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($users) {
              foreach ($users as $user) {
            ?>
                <tr>
                  <td><?php echo $user["id"]; ?></td>
                  <td><?php echo $user["full_name"]; ?></td>
                  <td><?php echo $user["email"] ?></td>
                  <td><?php echo $user["created_at"]; ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
        <!-- </div> -->

      </div>

    </div>
  </div>
</div>
</div>
<!-- Product Catagories Area End -->

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;