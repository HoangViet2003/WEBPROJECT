const url = window.location.href;
const id = url.substring(url.lastIndexOf("/") + 1);

window.onload = function(){
    console.log("test")
    getProductById(id)
}

var productImg = document.querySelector("#product-img")
var productDetail = document.querySelector("#product-detail")

function getProductById(id) {
    try{
        axios.get(`http://localhost:8000/api/products/${id}`).then((response) =>{
            const product = response.data

            console.log(product)

              
                   
                    var htmlsForImage = `<div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
    
                                <li class=" 'active'
                                            
                                            " data-target="#product_details_slider" data-slide-to="" style="
                      background-image: url()">
                                </li>
    
                            </ol>
                            <div class="carousel-inner">
    
                                <div class="carousel-item active 
                                                
                                               ">
                                    <a class="gallery_img" href="">
                                        <img class="d-block w-100" src="${ product?.images.length > 0 ? product.images[0].image_url : "../../../assets/img/product-img/product1.jpg"}" alt="Product slide" />
                                    </a>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>`

                var htmlsForDetail =
                    `<div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">$ ${product.price}</p>
                            <a href="product-details.html">
                                <h6>${product.name}</h6>
                            </a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                           
                   
                                </div>
                                <div class="review">
                                    <a href="#">Write A Review</a>
                                </div>
                            </div>
                            <!-- Avaiable -->
                  <i class="fa fa-circle"></i>
                 
                            </p>
                        </div>
    
                        <div class="short_overview my-5">
                            <p>
                                ${product.description}
                            </p>
                        </div>
                       
                    </div> `
    
                
           
            productImg.innerHTML += htmlsForImage;
            productDetail.innerHTML += htmlsForDetail;
        })
    }catch(error){
        console.log(error)
    }
}