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

    if (listProductBlock) {
        var htmls = products.map(function (product) {
            return ` <tr>
                      <td style="width: auto">${product.id}</td>
                      <td>${product.name}</td>
                      <td>${product.category}</td>
                      <td>${product.price}</td>
                      <td>${product.quantity}</td>
                    </tr>`;
        });

        listProductBlock.innerHTML = htmls.join("");
    }
}

async function searchProduct() {
    await axios({
        url: "http://localhost:8000/api/productSearch?name=test&page=1",
        method: "search",
        headers: {
            name: "test",
        },
    });
    let name = document.getElementById("name").value;
    searchProduct(name);
}
