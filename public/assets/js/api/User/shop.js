const url = window.location.href;
const page = url.substring(url.lastIndexOf("/") + 1);

window.onload = getAllproduct();

var productCardContainer = document.querySelector("#product-area");
var paginationLink = document.querySelector("#pagination-link");

function getAllproduct() {
    try {
        axios
            .get(`http://localhost:8000/api/products?page=${page}`)
            .then((response) => {
                const products = response.data.data;
            

                console.log(response);
                for (let i = 0; i < products.length; i++) {
                    var product = products[i];

                    var htmls = ` <div class="col-6 col-sm-4 col-md-6 col-xl-4">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="${
                            product?.images.length > 0
                                ? product.images[0].image_url
                                : "../../../assets/img/product-img/product1.jpg"
                        }" alt="" style="height: 440px" />
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="${
                            product?.images.length > 1
                                ? product.images[1].image_url
                                : "../../../assets/img/product-img/product1.jpg"
                        }" style="height: 440px" />
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">$${product.price}</p>
                            <a href="./product-detail/${product.id}">
                                <h6>${product.name}</h6>
                            </a>
                        </div>
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                   <i class="fa fa-star-o" aria-hidden="true"></i>
                      
                            </div>
                            <div class="cart">
                                <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="${"../../../assets/img/core-img/cart.png"}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>`;

                    productCardContainer.innerHTML += htmls;
                }

                for (var i = 1; i <= response.data.totalPage; i++) {
                    var htmlsPagination = ` <li class="page-item ${
                        response.data.currentPage === i ? "active" : null
                    }">
                                        <a class="page-link" href="/shop/${i}">
                                            ${i}</a>
                                         </li>`;

                    paginationLink.innerHTML += htmlsPagination;
                }
            });
    } catch (error) {
        console.log(error);
    }
}