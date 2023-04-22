async function getOrderByCartId(id) {
    $("body").toggleClass("loading");

    await axios
        .get(`http://localhost:8000/api/orders/getByCartId/${id}`, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("access_token")}`,
            },
        })
        .then((response) => {
            console.log(response);
            document.getElementById("orderId").innerHTML = response.data.id;

            let estimatedDate = new Date(response.data.created_at);
            estimatedDate.setDate(estimatedDate.getDate() + 7);

            // Format the date to dd/mm/yyyy
            estimatedDate = estimatedDate.toLocaleDateString("en-GB");

            document.getElementById("estimateDate").innerHTML = estimatedDate;

            document.getElementById("address").innerHTML =
                response.data.address;

            document.getElementById("total").innerHTML =
                response.data.total.toLocaleString();

            if (response.data.is_confirmed == 0) {
                document.getElementById("status").innerHTML = "Pending";

                const track = document.getElementById("track");
                track.innerHTML = `<div class="step">
                <span class="icon"> <i class="fa fa-check"></i> </span>
                <span class="text">Order confirmed</span>
            </div>
            <div class="step">
                <span class="icon"> <i class="fa fa-truck"></i> </span>
                <span class="text">Order shipped</span>
            </div>
            <div class="step">
                <span class="icon"> <i class="fa fa-archive"></i> </span>
                <span class="text">Order delivered</span>
            </div>`;
            } else {
                document.getElementById("status").innerHTML = "Confirmed";

                const track = document.getElementById("track");

                track.innerHTML = `            <div class="step active">
                <span class="icon"> <i class="fa fa-check"></i> </span>
                <span class="text">Order confirmed</span>
            </div>
            <div class="step active">
                <span class="icon"> <i class="fa fa-truck"></i> </span>
                <span class="text">Order shipped</span>
            </div>
            <div class="step active">
                <span class="icon"> <i class="fa fa-archive"></i> </span>
                <span class="text">Order delivered</span>
            </div>`;
            }

            // For loop the order items to display the product
            const orderItems = response.data.order_items;

            for (let i = 0; i < orderItems.length; i++) {
                const orderItem = orderItems[i];

                const product = orderItem.product;

                const productItemsContainer = document.getElementById(
                    "productItemsContainer"
                );

                const productItemHtml = `
                <li class="col-md-4">
                <figure class="itemside mb-3">
                    <div>
                        <img
                            src=${
                                product.images.length > 0
                                    ? product.images[0].image
                                    : "https://via.placeholder.com/100x100"
                            }
                            class="img-sm rounded"
                        />
                    </div>
                    <figcaption class="info align-self-center">
                        <p class="title">${product.name}</p>
                        <span class="text-muted">$ ${product.price.toLocaleString()} * ${
                    orderItem.quantity
                } = ${(
                    product.price * orderItem.quantity
                ).toLocaleString()}</span>
                        <span> </span>
                    </figcaption>
                </figure>
            </li>
                `;

                productItemsContainer.innerHTML += productItemHtml;
            }

            $("body").toggleClass("loading");
        })
        .catch((error) => {
            console.log(error);
            $("body").toggleClass("loading");
        });
}

$(document).ready(function () {
    getOrderByCartId(localStorage.getItem("cart_id"));
});
