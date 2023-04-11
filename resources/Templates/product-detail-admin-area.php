<?php
// User need to log in to view this page
if (!isset($_SESSION['useremail']) || !isset($_SESSION['is_admin'])) {
  header('Location: login.php');
  exit();
}

// Get user details from db
if ($_GET['id']) {
  $product_details = $product->getProduct($_GET['id']);
}
?>

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="cart-title mt-50">
          <h2><?php echo $product_details ? "Details" : "New product" ?></h2>
        </div>

        <div class="col-md-12">

          <form action="" method="post" id="productform" enctype="multipart/form-data">
            <div class="form-group">
              <?php
              if ($product_details["id"]) {
                echo "<label for='id'>ID (cannot change this field)</label>";
                echo "<input type='text' class='form-control' id='id' name='id' value='" . $product_details["id"] . "' readonly>";
              }
              ?>
            </div>
            <div class="form-group">
              <label for="fullName">Product Name</label>
              <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product_details["name"] ?>" required />
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="price">Price ( $ )</label>
                  <input type="number" class="form-control" name="product_price" id="price" value="<?php echo $product_details["price"] ?>" />
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="product_quantity">Quantity</label>
                  <input type="number" class="form-control" name="product_quantity" id="quantity" value="<?php echo $product_details["quantity"] ?>" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="category">Category</label>
              <select class="" id="category" name="product_category" style="float: none !important">
                <?php
                $array_options = ["Chair", "Bed", "Accessories", "Furniture", "Home Deco"];

                foreach ($array_options as $option) {
                  if ($option == $product_details["category"]) {
                    echo "<option value='$option' selected>$option</option>";
                  } else {
                    echo "<option value='$option'>$option</option>";
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" rows="7"><?php echo $product_details["description"] ?></textarea>
            </div>


            <?php
            if (!$product_details) {
            ?>
              <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control-file" name="images" id="images-input" multiple accept="image/*" />

              </div>

              <div class="images-container" id="images-container">
              </div>

            <?php } ?>

            <?php
            if ($product_details) {
              echo "<div class='form-group'>";
              echo "<label for='images'>Images</label>";
              $images = json_decode($product_details['images']);
              echo "<div class='images-container' id='images-container'>";
              foreach ($images as $image) {
                echo "<div class='image'>";
                echo "<img src='$image' alt='image-product'><span onclick='delImage(${index})'>&times;</span>";
                echo "</div>";
              }
              echo "</div>";
            }
            ?>

            <div class="row">
              <div class="row mt-5">
                <div class="col">
                  <button type="submit" class="btn amado-btn" >
                    <?php echo $product_details ? "Save changes" : "Create" ?>
                  </button>
                </div>
                <?php
                if ($product_details) {
                ?>
                  <div class="col">
                    <a class="btn amado-btn active" name="delete" onclick="deleteProduct(<?php echo $product_details["id"]; ?>)" style="color: white">
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
<script>
  var files = []
  var imagesInput = document.getElementById("images-input");
  var imagesContainer = document.getElementById("images-container");

  window.onload = function() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

      imagesInput.addEventListener("change", () => {
        let imageFiles = imagesInput.files;
        if (imageFiles.length == 0) return;

        for (let i = 0; i < imageFiles.length; i++) {
          files.push(imageFiles[i]);
        }
        showImages();
      });
    } else {
      console.log("Your browser does not support File API");
    }
  }

  function showImages() {
    let images = files.reduce(function(prev, file, index) {
      return (prev += `<div class="image">
    		<img src="${URL.createObjectURL(file)}" alt="image">
    		<span onclick="delImage(${index})">&times;</span>
    	</div>`);
    }, "");
    imagesContainer.innerHTML = images;
  }

  function delImage(index) {
    files.splice(index, 1);
    showImages();
  }
</script>
<!-- ##### Main Content Wrapper End ##### -->