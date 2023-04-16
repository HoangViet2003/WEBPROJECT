window.onload = () => {
    const pathArray = window.location.pathname.split("/");
    const order_id = pathArray[pathArray.length - 1];
    console.log(order_id)
};
    let orders = [];

window.onload = function start() {
    getAllOrder(function (orders) {
        renderOrders(orders);
    })
}

 async function getAllOrder(callback) {
   await axios({
    url: 'https://localhost:8000/api/orders',
    method: 'GET',
    headers: {
        "Authorization ": `Bearer ${token}`,
    },
   })
   .then(function (response) {
    console.log(response);
    orders = response.data;
    
    //    return response
    })
    .then(callback)
    .catch(function (error) {
        console.log(error);
    });
}

getAllOrder()

async function renderOrders() {
    var listOrderBlock = document.querySelector("#tables-order");
    var htmls = orders.data.map(function (order) {
        return ` <tr>
                  <td style="width: auto">${order.id}</td>
                  <td>${order.total}</td>
                  <td>${order.status}</td>
                </tr>`;
    });
    listOrderBlock.innerHTML = htmls.join("");
}


function deleteOrder(id = order_id) {
    let confirmDelete = confirm(
        "Are you sure you want to delete the product?"
    );

    if (confirmDelete) {
        const data = { id, method: "delete" };
        axios({
            url: `http://localhost:8000/api/orders/${id}`,
            method: "delete",
            data: data,
            headers: {
                "Authorization ": `Bearer ${token}`,
            },
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
    }
}

$(document).ready(function (e, id = order_id) {
    $("#orderform").on("submit", async function (e) {
        e.preventDefault();
        $("body").toggleClass("loading");

        // Get form inputs
        let name = $("#order_name").val();
        let total = $("#order_total").val();
        let status = $("#order_status").val();
        // Check if the form is for updating or creating a new product
        if (!document.getElementById("id")) {
          
            await axios({
                url: `http://localhost:8000/api/orders/${id}`,
                method: "put",
                data: JSON.stringify({
                    name: name,
                    total: total,
                    status: status,
                }),

                headers: {
                    "Content-Type": "application/json",
                    "Authorization ":
                        `Bearer ${token}`,
                },
            })
                .then(function (response) {
                    $("body").toggleClass("loading");
                    console.log(response);
                    // redirect to products page
                    // window.location.href = "productsAdmin.php";
                })
                .catch(function (error) {
                    console.log(error);

                    $("body").toggleClass("loading");
                });
        } else {
            let id = document.getElementById("id").value;
            updateProduct(id);
        }
    });
});



