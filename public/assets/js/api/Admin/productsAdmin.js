var listProduct = document.querySelector("#tables-product");

function start() {
    getProduct(function (products) {
        renderProduct(products);
    });
}

start();

function getProduct(callback) {
    fetch("http://localhost:8000/api/getAllProducts")
        .then(function (response) {
            return response.json();
        })
        .then(callback);
}

function renderProduct(products) {
    var listProductBlock = document.querySelector("#tables-product");
    var htmls = products.map(function (product) {
        return ` <tr>
                  <td style="width: auto">${product.id}</td>
                  <td href="/product-detail-admin">${product.name}</td>
                  <td>${product.category_id}</td>
                  <td>${product.price}</td>
                  <td>${product.quantity}</td>
                </tr>`;
    });
    listProductBlock.innerHTML = htmls.join("");
}
