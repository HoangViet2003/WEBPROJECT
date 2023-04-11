<!-- Product Catagories Area Start -->
<?php
// get all orders
$products = $product->getDataWithoutLimit();

?>
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

        <!-- <div class="row"> -->
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
          <tbody>
            <?php
            if ($products) {
              foreach ($products as $product) {
            ?>
                <tr>
                  <td style="width: auto"><?php echo $product["id"]; ?></td>
                  <td><?php echo $product["name"]; ?></td>
                  <td><?php echo $product["category"] ?></td>
                  <td><?php echo "$ " . number_format($product["price"], 0, '.', ',') ?></td>
                  <td><?php echo $product["quantity"]; ?></td>
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