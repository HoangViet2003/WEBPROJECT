
function start() {
  getProduct(function (carts) {
      renderProduct(carts.data);
  });
}

window.onload = start();

async function getProduct(callback) {
  await axios({
    url: 'http://localhost:8000/api/carts',
    method: 'GET',
    Headers: {
      'Authorization': 'Bearer ' 
    }
  })
      .then(function (response) {
          return response.json();
      })
      .then(callback);
}

function renderCart(carts) {

  for (var i = 0; i < carts.length; i++) {
    var listProductBlock = document.querySelector("#tables-cart-product")
      var htmls = carts.map(function (cart) {
        return ` <tr>
                  <td>${
                    cart.images.length > 0
                        ? cart?.images[0].image_url
                        : "../../../assets/img/product-img/product1.jpg"
                }</td>
                  <td>${cart.name}</td>
                  <td>${cart.price}</td>
                  <td>${cart.quantity}</td>
                </tr>`;
    });
    listProductBlock.innerHTML = htmls.join("");
}}

// async function getProduct(callback) {
//     await fetch({url:`http://localhost:8000/api/carts`, method: "GET", headers: {
//                     "Authorization ": `Bearer ${token}`,
//                 },})
//         .then(function (response) {
//             console.log(response)
//             return response.json();
//         })
//         .then(callback);
// }

// function renderProduct(products) {  
//     var listProductBlock = document.querySelector('tables-product');
//     var htmls = products.map(function (product) {
//         return ` <tr>
//                   <td style="width: auto">${product.id}</td>
//                   <td>${product.img}</td>
//                   <td>${product.name}</td>
//                   <td>${product.price}</td>
//                   <td>${product.quantity}</td>
//                 </tr>`;
//     });
//     listProductBlock.innerHTML = htmls.join("");
// }