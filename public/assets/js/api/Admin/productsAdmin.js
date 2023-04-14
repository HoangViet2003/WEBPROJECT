var listProduct = document.querySelector("#tables-product");

function start() {
    getProduct(function (products) {
        console.log(products)
        renderProduct(products);
        handleCreateProduct();
    });
}

start();

 function getProduct() {
   fetch({
        url: "http://localhost:8000/api/getAllProducts",
        method: "get",
       
    }).then(function (response) {
        // return "success"
        console.log(response)
    });
}

function renderProduct(products) {
    var listProductBlock = document.querySelector("#tables-product");
    var htmls = products.map(function (product) {
        return ` <tr>
                  <td style="width: auto">${product.id}</td>
                  <td>${product.name}</td>
                  <td>${product.category_id}</td>
                  <td>${product.price}</td>
                  <td>${product.quantity}</td>
                </tr>`;
    });
    listProductBlock.innerHTML = htmls.join("");
}

function handleCreateProduct() {
    var createBtn = document.getElementById("#create-product");
    createBtn.onclick = function () {
        console.log("test");
    };
}
