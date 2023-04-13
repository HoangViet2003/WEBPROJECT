<!-- Product Catagories Area Start -->
{{-- <?php
// get all orders
$orders = $order->getAllOrders();

?> --}}
<div class="dashboard-table-area section-padding-100">
  <div>
    <div>
      <div>
        <div class="cart-title mt-50">
          <h2>Orders Dashboard</h2>
        </div>

        <table class="stripe row-border order-column display nowrap" id="myTable" style="width: 100%">
          <thead>
            <tr>
              <th>Order id</th>
              <!-- <th>Cart id</th> -->
              <th>Total ($)</th>
              <th>Status</th>
              <th>Created at</th>
            </tr>
          </thead>
          <tbody>
            {{-- <!-- <?php
            if ($orders) {
              foreach ($orders as $order) {
            ?> --> --}}
                <tr>
                  <td>card_id</td>
                  <td>total</td>
                  <td>comfirmed</td>
                  <td>create at</td>
                </tr>
            {{-- <!-- <?php
              }
            }
            ?> --> --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Product Catagories Area End -->

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;