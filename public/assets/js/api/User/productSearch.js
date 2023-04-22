const urlParams = new URLSearchParams(window.location.search);
const keyword = urlParams.get("keyword");
var productCardContainer = document.querySelector("#product-area");
var paginationLink = document.querySelector("#pagination-link");
var totalProduct = document.querySelector("#total-product");

getSearchResult();

function getSearchResult() {
    try {
        $("body").toggleClass("loading");
        axios
            .get(
                `http://localhost:8000/api/productSearch?name=${keyword}&page=1`
            )
            .then((response) => {
                $("body").toggleClass("loading");
                console.log(response);
                const products = response.data.data;
                const totalLength = response.data.totalLength;
                // const start = (page - 1) * 9 == 0 ? 1 : (page - 1) * 9;
                // const end =
                //     (page - 1) * 9 + 9 > totalLength
                //         ? totalLength
                //         : (page - 1) * 9 + 9;
                // console.log(response);
                // if (products.length === 0) {
                //     totalProduct.innerHTML = "<p>No results</p>";
                // } else {
                //     totalProduct.innerHTML = `<p>Showing ${start} - ${end} of ${totalLength} results</p>`;
                // }

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
                            <a href="http://localhost:8000/product-detail/${
                                product.id
                            }">
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
                                <a href="/cart" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="${"../../../assets/img/core-img/cart.png"}" alt="" /></a>
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
            })
            .catch((error) => {
                $("body").toggleClass("loading");
                console.log(error);
            });
    } catch (e) {
        console.log(e);
    }
}
