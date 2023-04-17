// const token = localStorage.getItem('access-token')

$(document).ready(function () {
    // Get the id of the ordeer from the url
    const url = window.location.href;
    const id = url.substring(url.lastIndexOf("/") + 1);
    let is_confirmed = false;
    // If the id exists, get the product from the api
    if (id && id !== "order-detail-admin") {
        $("body").toggleClass("loading");
        try {
            axios
                .get(`http://localhost:8000/api/orders/${id}`, {
                    headers: {
                        "Authorization ": `Bearer ${token}`,
                    },
                })
                .then((response) => {
                    const order = response.data;
                    is_confirmed = order.is_confirmed;
                    console.log(response);

                    // window.location.href = "users-admin";
                    $("body").toggleClass("loading");
                })
                .catch((error) => {
                    $("body").toggleClass("loading");

                    if (error.response?.status === 404) {
                        alert("user not found");
                        window.location.href = "/orders-admin";
                    } else {
                        console.log(error);
                    }
                });
        } catch (error) {
            // if error code is 404, alert the user
            $("body").toggleClass("loading");
            if (error.response.status === 404) {
                alert("user not found");
            }
        }
    } 
});

 async function confirmOrder() {
    
        $("body").toggleClass("loading");
        const url = window.location.href;
        const id = url.substring(url.lastIndexOf("/") + 1);
       
     

        await axios({
            url: `http://localhost:8000/api/orders/${id}`,
            method: "put",
            data: JSON.stringify({
              
                is_confirmed: true
            }),

            headers: {
                "Content-Type": "application/json",
                "Authorization ": `Bearer ${token}`,
                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
        })
            .then(function (response) {
                $("body").toggleClass("loading");
                // redirect to order page
                console.log(response);
                // window.location.href = "/users-admin";
            })
            .catch(function (error) {
                console.log(error);

                $("body").toggleClass("loading");
            });
    };

    
function renderOrder(orders) {
    var listOrderBlock = document.querySelector("#tables-order");

    var htmls = orders.map(function (order) {
        return ` <tr>
                  <td style="width: auto">${order.id}</td>
                  <td>${order.address}</td>
                  <td>${order.total}</td>
                  <td>${order.status}</td>
                </tr>`;
    });
    listProductBlock.innerHTML = htmls.join("");
}
