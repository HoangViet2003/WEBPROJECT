const url = window.location.href;
const id = url.substring(url.lastIndexOf("/") + 1);

window.onload = getProductById(id);

var productPrice = document.querySelector("#product-price");
var productImg = document.querySelector("#product-img");
var productDescription = document.querySelector("#product-description");
var productName = document.querySelector("#product-name");
var productTitle = document.querySelector("#product-title");
var productStatus = document.querySelector("#product-status");
var ratingStar = document.querySelector("#rating-star");
var quantitySelection = document.getElementById("#quantity-selection");
var productImage = document.querySelector("#product-image");
var productImageSlide = document.querySelector("#product-image-slide");
var btnAdd = document.querySelector("#btn-add");
var btnOutOfOrder = document.querySelector("#btn-out-of-order");
var productCategory = document.querySelector("#product-category");
var quantity = document.querySelector("#qty");

var product;

function getProductById(id) {
    try {
        axios
            .get(`http://localhost:8000/api/products/${id}`)
            .then((response) => {
                //   $("body").toggleClass("loading");
                product = response.data;
                console.log(product);
                quantity.setAttribute("max", product.quantity);
                for (let i = 0; i < product.images.length; i++) {
                    productImageSlide.innerHTML += `<li class="${
                        i === 0 ? "active" : ""
                    }" data-target="#product_details_slider" data-slide-to="${i}"
                                    style="
                  background-image: url(${product.images[i].image_url});
                ">
                                </li>`;
                }

                for (let i = 0; i < product.images.length; i++) {
                    productImage.innerHTML += `  <div class="carousel-item ${
                        i === 0 ? "active" : ""
                    } >
                                    <a class="gallery_img" href="">
                                        <img class="d-block w-100" src="${
                                            product.images[i].image_url
                                        }"
                                            alt="Product slide" />
                                    </a>
                                </div>`;
                }

                productDescription.innerHTML = product.description;
                for (let i = 0; i < product.rating; i++) {
                    ratingStar.innerHTML += `<i class="fa fa-star" aria-hidden="true"></i>`;
                }
                for (let i = 0; i < 5 - product.rating; i++) {
                    ratingStar.innerHTML += `<i class="fa fa-star-o" aria-hidden="true"></i>`;
                }
                // console.log(product)
                if (product.status === "in_stock") {
                    productStatus.classList.toggle("avaibility");
                    productStatus.innerHTML = ` <i class="fa fa-circle"></i> In stock - ${product.quantity} products available`;
                    btnOutOfOrder.style.display = "none";
                } else if (product.status === "out_of_stock") {
                    productStatus.classList.toggle("outstock");
                    productStatus.innerHTML = ` <i class="fa fa-circle"></i> Out of Stock`;
                    btnAdd.style.display = "none";
                    quantitySelection.remove();
                } else {
                    productStatus.classList.toggle("runninglow");
                    productStatus.innerHTML = ` <i class="fa fa-circle"></i> Running Low - ${product.quantity} products available`;
                    btnOutOfOrder.style.display = "none";
                }

                productCategory.innerHTML = product.category;
                productTitle.innerHTML = product.name;
                productName.innerHTML = product.name;
                productPrice.innerHTML = product.price;
            });
    } catch (error) {
        console.log(error);
    }
}

function addToCart() {
    try {
        axios({
            url: "http://localhost:8000/api/cartItem",
            method: "POST",
            data: JSON.stringify({
                cart_id: localStorage.getItem("cart_id"),
                product_id: product.id,
                quantity: 20,
            }),
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + localStorage.getItem("access_token"),
            },
        }).then((response) => {
            alert("Add to cart successfully");
            console.log(response);
        });
    } catch (error) {
        console.log(error);
    }
}
