const token = localStorage.getItem("access_token");

function start() {
    getAllOrder(function (orders) {
        renderOrders(orders);
    });
};

start();

async function getAllOrder(callback) {
    await axios({
        url:`https://localhost:8000/api/orders`,
        method: 'GET',
        Headers: {
            "Authorization": `Bearer ${token}`,
        }
    })
        .then((response) =>{
           console.log(response)
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

