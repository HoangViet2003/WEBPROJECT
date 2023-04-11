function deleteProduct(id) {
  let confirmDelete = confirm(
    "Are you sure you want to delete the item with from the cart?"
  );

  if (confirmDelete) {
    const data = { id, method: "delete" };
    $.ajax({
      url: "product-actions.php",
      type: "POST",
      data: data,
      success: function (response) {
        console.log(response);
        alert("Product deleted successfully");
        window.location.href = "productsAdmin.php";
      },
    });
  }
}

function updateProduct(id) {
  // Get updated informatin
  let name = $("#product_name").val();
  let description = $("#description").val();
  let price = $("#price").val();
  let quantity = $("#quantity").val();
  let category = $("#category").val();

  const data = {
    id,
    name,
    price,
    quantity,
    description,
    category,
    method: "update",
  };

  $.ajax({
    url: "product-actions.php",
    type: "POST",
    data: data,
    success: function (response) {
      console.log(response);
      alert("Product updated successfully");
      window.location.href = "productsAdmin.php";
    },
  });
}

$(document).ready(function (e) {
  $("#productform").on("submit", function (e) {
    e.preventDefault();
    $("body").toggleClass("loading");

    // Get form inputs
    let name = $("#product_name").val();
    let description = $("#description").val();
    let price = $("#price").val();
    let quantity = $("#quantity").val();
    let category = $("#category").val();

    if (!document.getElementById("id")) {
      let images = document.getElementById("images-input").files;

      var form_data = new FormData();
      for (let i = 0; i < images.length; i++) {
        form_data.append("files[]", images[i]);
      }

      $.ajax({
        url: "ajax-php-file.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
          $("body").toggleClass("loading");
          if (response == "File size cannot be larger than 100kb") {
            alert(response);
          } else if (response == "File is already exists") {
            alert(response);
          } else {
            const images = response;
            const data = {
              name,
              description,
              price,
              quantity,
              category,
              images,
              method: "create",
            };

            $.ajax({
              url: "product-actions.php",
              type: "POST",
              data: data,
              success: function (response) {
                if (response == 1) {
                  alert("Product added successfully");
                  window.location.href = "productsAdmin.php";
                }
              },
            });
          }
        },
      });
    } else {
      let id = document.getElementById("id").value;
      updateProduct(id);
    }
  });
});
