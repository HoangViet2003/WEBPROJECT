<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
  <div class="container">
    <div class="row align-items-center">
      <!-- Single Widget Area -->
      <div class="col-12 col-lg-4">
        <div class="single_widget_area">
          <!-- Logo -->
          <div class="footer-logo mr-50">
            <a href="index.php"><img src="img/core-img/logo2.png" alt="" /></a>
          </div>
          <p class="copywrite">
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved
          </p>
        </div>
      </div>
      <!-- Single Widget Area -->
      <div class="col-12 col-lg-8">
        <div class="single_widget_area">
          <!-- Footer Menu -->
          <div class="footer_menu">
            <nav class="navbar navbar-expand-lg justify-content-end">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="footerNavContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="checkout.php">Checkout</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="modal">
  <!-- Place at bottom of page -->
</div>
<!-- ##### Footer Area End ##### -->

<!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

<script src='DataTables/datatables.min.js'></script>

<script src="js/product-details.js"></script>

<script src="js/user.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
  $(document).ready(function() {
    var table = $('#myTable').removeAttr('width').DataTable({
      scrollY: "300px",
      scrollX: true,
      scrollCollapse: true,
      // paging: true,
      dom: 'Bfrtip',
      buttons: [
        'excel', 'pdf',
      ],

      columnDefs: [{
        width: 80,
        targets: 0
      }, {
        "className": "dt-center",
        "targets": "_all"
      }, {
        className: "dt-head-center",
        targets: "_all"
      }, ],
      fixedColumns: true
    });



    $('#myTable tbody').on('dblclick', 'tr', function() {
      var data = table.row(this).data();

      // Get the path name of the current page
      var path = window.location.pathname;
      // Get the last part of the path name
      var page = path.split("/").pop();
      console.log(page);
      // Redirect to details page
      if (page == "productsAdmin.php") {
        window.location.href = "product-details-admin.php?id=" + data[0];
      } else if (page == "ordersAdmin.php") {
        window.location.href = "orderDetails.php?id=" + data[0];
      } else if (page == "usersAdmin.php") {
        window.location.href = "user-detail-admin.php?id=" + data[0];
      } else if (page == "indexAdmin.php") {
        window.location.href = "order-detail-admin.php?id=" + data[0];
      }
    });
  });
</script>


</body>

</html>