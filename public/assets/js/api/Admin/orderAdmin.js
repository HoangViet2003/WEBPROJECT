const token = localStorage.getItem("access_token");

function start() {
    getAllOrder(function (orders) {
        renderOrders(orders);
    });
};

start();

async function getAllOrder(callback) {
   fetch("https://localhost:8000/api/orders",{
        headers: {
            Authorization: `Bearer ${token}`,
        },
    })
        .then(function (response) {
           return response.json();
        })
        .then(callback)
        .catch(function (error) {
            console.log(error);
        });
}

async function renderOrders() {
    var listOrderBlock = document.querySelector("#tables-order");

    if (!listOrderBlock) return;

    var htmls = orders.map(function (order) {
        return ` <tr>
                  <td style="width: auto">${order.id}</td>
                  <td>${order.total}</td>
                  <td>${order.status}</td>
                  <td>${order.is_admin}</td>
                </tr>`;
    });
    listOrderBlock.innerHTML = htmls.join("");
}

