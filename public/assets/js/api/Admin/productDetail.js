var files = [];
var imagesInput = document.getElementById("images-input");
var imagesContainer = document.getElementById("images-container");

if (window.File && window.FileList && window.FileReader) {
    imagesInput.addEventListener("change", () => {
        // If the images container is empty, add the images to the container
        if (!imagesContainer.innerHTML) {
            let imageFiles = imagesInput.files;

            if (imageFiles.length == 0) return;

            for (let i = 0; i < imageFiles.length; i++) {
                files.push(imageFiles[i]);
            }

            showImages();
        } else {
            // If the images container is not empty, add the new images to the container
            let imageFiles = imagesInput.files;

            if (imageFiles.length == 0) return;

            for (let i = 0; i < imageFiles.length; i++) {
                files.push(imageFiles[i]);
            }

            appendImages();
        }
    });
} else {
    console.log("Your browser does not support File API");
}

$(document).ready(function () {
    // Get the id of the product from the url
    const url = window.location.href;
    const id = url.substring(url.lastIndexOf("/") + 1);

    // If the id exists, get the product from the api
    if (id && id !== "product-detail-admin") {
        $("body").toggleClass("loading");
        try {
            axios
                .get(`http://localhost:8000/api/products/${id}`)
                .then((response) => {
                    const product = response.data;

                    // Set the values of the input fields
                    $("#product_id").val(product.id);
                    $("#product_name").val(product.name);
                    $("#description").val(product.description);
                    $("#price").val(product.price);
                    $("#quantity").val(product.quantity);
                    $("#description").val(product.description);

                    // Set the selected value of the category dropdown for option
                    $("#product_category").val("Home Deco");

                    // Display the images of the product
                    const images = product.images;

                    // Loop through the images and display them
                    const imagesContainer =
                        document.querySelector("#images-container");

                    images.forEach((image, index) => {
                        const imageDiv = `
                        <div class="image">
                        <img
                            src="${image.image_url}"
                            alt="image-product"
                        /><span onclick="delImage(${index})"
                            >&times;</span
                        >
                    </div>`;
                        imagesContainer.innerHTML += imageDiv;
                    });

                    $("body").toggleClass("loading");
                })
                .catch((error) => {
                    $("body").toggleClass("loading");

                    if (error.response?.status === 404) {
                        alert("Product not found");
                        window.location.href = "/product-admin";
                    } else {
                        console.log(error);
                    }
                });
        } catch (error) {
            // if error code is 404, alert the user
            $("body").toggleClass("loading");
            if (error.response.status === 404) {
                alert("Product not found");
            }
        }
    } else {
        // Display none the delete button
        $("#delete-btn").css("display", "none");

        // Display none the input and label
        $("#product_id").css("display", "none");
        $("#product_id_label").css("display", "none");

        // Change the text of the submit button to Create product
        $("#create-product").text("Create product");
    }
});

function showImages() {
    let images = files.reduce(function (prev, file, index) {
        return (prev += `<div class="image">
  <img src="${URL.createObjectURL(file)}" alt="image">
  <span onclick="delImage(${index})">&times;</span>
 </div>`);
    }, "");

    imagesContainer.innerHTML = images;
}

function appendImages() {
    let images = files.reduce(function (prev, file, index) {
        return (prev += `<div class="image">
  <img src="${URL.createObjectURL(file)}" alt="image">
  <span onclick="delImage(${
      imagesContainer.innerHTML.length + index - 1
  })">&times;</span>
 </div>`);
    }, "");

    imagesContainer.innerHTML += images;
}

function delImage(index) {
    files.splice(index, 1);
    showImages();
}
