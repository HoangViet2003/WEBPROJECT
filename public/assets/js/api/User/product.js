// const { default: axios } = require("axios");

var listProduct = document.querySelector("#single-product-area");

function start() {
    getProduct(function (products) {
        renderProduct(products.data);
    });
}

window.onload = start();

async function getProduct(callback) {
    await fetch("http://localhost:8000/api/products?page=5")
        .then(function (response) {
            return response.json();
        })
        .then(callback);
}

function renderProduct(products) {
    var listProductBlock = document.querySelector(".amado-pro-catagory");

    for (var i = 0; i < products.length; i++) {
        var product = products[i];

        var html = `
            <div class="single-products-catagory clearfix" >
                <a href="/products/${product.id}">
                    <img src=${
                        product?.images.length > 0
                            ? product?.images[0].image_url
                            : "../../../assets/img/product-img/product1.jpg"
                    } alt="">

                    <div class="hover-content">
                        <div class="line"></div>
                        <p>From $ ${product?.price}</p>
                        <h4>${product?.name}</h4>
                    </div>
                </a>
           </div>
            `;

        listProductBlock.innerHTML += html;
    }
}

function searchProduct() {}

// function addToCart(product){
//     var productItem = $(product).closest('.product')
//     var price = $(productItem).find('.price').text();
//     var name = $(productItem).find('.name').text();

//     var cartItem = {
//         price: price,
//         name: name,
//     }
//     var cartItemJSON = JSON.stringify(cartItem);
//     cartArray.push(cartItemJSON);
// }

// window.onload = async () => {
//     try {
//         const response = await fetch(
//             "http://localhost:8000/api/products?page=1"
//         );

//         const products = await response.json();

//         console.log(products.data);

//         var htmls = products.map(function(product)  {
//             return `
//                 <a href="./shop">
//                 <img src='${
//                     product.images.length > 0
//                         ? product.images[0].image_url
//                         : null
//                 }' alt="product_category" />

//                 <div class="hover-content">
//                 <div class="line"></div>
//                 <p>From $100 ?? "Unknown" ${product.name} ></p>
//                 <h4>55555</h4>
//                 </div>
//                 </a> `;
//         })

//        var html = htmls.join('');
//         document.querySelector(
//             "#single-product-area"
//         ).innerHTML = html;
//     } catch (error) {
//         console.log(error);
//     }
// };
