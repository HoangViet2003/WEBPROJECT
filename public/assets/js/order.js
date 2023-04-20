// const { default: axios } = require("axios");

const token = localStorage.getItem("access_token");
let orders = [];

// window.onload = function start() {
//     getAllOrder(function (orders) {
//         renderOrders();
//     });
// };

getAllOrder()

async function getAllOrder(callback) {
    await axios({
        url: "https://localhost:8000/api/orders",
        method: "GET",
        headers: {
            Authorization: `Bearer ${token}`,
        },
    })
        .then(function (response) {
            orders = response.data;
            console.log(orders.data);
        })
        .then(callback)
        .catch(function (error) {
            console.log(error);
        });
}

async function renderOrders() {
    var listOrderBlock = document.querySelector("#tables-order");

    if (!listOrderBlock) return;

    var htmls = orders.data.map(function (order) {
        return ` <tr>
                  <td style="width: auto">${order.id}</td>
                  <td>${order.total}</td>
                  <td>${order.status}</td>
                  <td>${order.is_admin}</td>
                </tr>`;
    });
    listOrderBlock.innerHTML = htmls.join("");
}
