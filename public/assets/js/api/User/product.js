// window.onload = async () => {
//     try {
//         const response = await fetch(
//             "http://localhost:8000/api/products?page=1"
//         );

//         let productsSection = document.getElementsByClassName(
//             "products-catagories-area clearfix"
//             // "amado-pro-catagory clearfix"
          
//         )[0];

//         const products = await response.json();
//         console.log(products);

//         products?.data.forEach((product) => {
//             productsSection.innerHTML += `
            
//                 <div class="single-products-catagory clearfix">
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
//                 </a>
//            </div>
//                 `;
//         });
//     } catch (error) {
//         console.log(error);
//     }
// };

var listProduct = document.querySelector('#single-product-area');

function start(){
    getProduct(function(products){
        console.log(products)
       renderProduct(products.data);
    });
}

start();

function getProduct(callback){
    fetch("http://localhost:8000/api/products?page=3").then(function(response){
        return response.json();
    }).then(callback);
}

function renderProduct(products){
    var listProductBlock = document.querySelector('#single-product-area');
    var htmls = products.map(function(product){
        return ` <a href="./shop">
                <img src='${
                    product.images.length > 0
                        ? product.images[0].image_url
                        : null
                }' alt="product_category" />
    
                <div class="hover-content">
                <div class="line"></div>
                <p>From $100 ?? "Unknown" ${product.name} ></p>
                <h4>${product.price}</h4>
                </div>
                </a>`
    })
    listProductBlock.innerHTML =htmls.join('');
}



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
