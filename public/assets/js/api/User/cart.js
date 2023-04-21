const token = localStorage.getItem("access_token");

getCartById();

var cartItemSection = document.querySelector("#cart-item-section");
// let subTotalPrice = document.querySelector("#sub-total-price");
// let totalPrice = document.querySelector("#total-price");
var quantity = document.querySelector("#qty");
var cart;
var cartItems;

async function getCartById() {
    try {
        await axios({
            url: `http://localhost:8000/api/carts/${localStorage.getItem(
                "cart_id"
            )}`,
            method: "GET",
            headers: {
                Authorization: "Bearer " + localStorage.getItem("access_token"),
            },
        }).then((response) => {
            cart = response.data;
            cartItems = response.data.items;
            console.log(cartItems);
            for (let i = 0; i < cartItems.length; i++) {
                var html = `<tr ></tr>
         <td class="cart_product_img">
          <a href="#" id="product-img"><img src="${
              cartItems[i].product.images[0]?.image_url
                  ? cartItems[i].product.images[0].image_url
                  : "../../../assets/img/product-img/product1.jpg"
          }" alt="Product" /></a>
         </td>
         <td class="cart_product_desc">
          <h5 id="product-name">${cartItems[i].product.name}</h5>
         </td>
         <td class="price">
          <span id="product-price">${cartItems[i].product.price}</span>
         </td>
         <td class="qty">
          <div class="qty-btn d-flex">
           <p id="product-quantity">Qty</p>
           <div class="quantity">
            <span style="margin-right: 4px" class="qty-minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
            <input type="number" id="qty" step="1" min="1" max="300" name="quantity"  value="${
                cartItems[i].quantity
            }"/>
            <span class="qty-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
           </div>
          </div>
         </td>
        </tr> `;

                cartItemSection.innerHTML += html;
            }

            totalPrice.innerHTML = cart.total;
            subTotalPrice.innerHTML = cart.total;
        });
    } catch (error) {
        console.log(error);
    }
}

let subTotalPrice = document.querySelector("#sub-total-price");
let totalPrice = document.querySelector("#total-price");

window.onload = onLoad;

function onLoad() {
    const quantities = document.querySelectorAll(".qty-text");
    const prices = document.querySelectorAll(".price");

    for (let i = 0; i < quantities.length; i++) {
        totalPrice.innerHTML =
            parseInt(totalPrice.innerHTML) +
            parseInt(quantities[i].value) *
                parseInt(prices[i].children.item(0).innerHTML);
    }

    totalPrice.innerHTML = parseInt(totalPrice.innerHTML).toLocaleString();
    subTotalPrice.innerHTML = totalPrice.innerHTML;
}

function updateProductQuantity(event) {
    let currentRow =
        event.target.parentElement.parentElement.parentElement.parentElement
            .parentElement;
    let currentRowId = currentRow.id;

    const currentItemPrice = currentRow.children
        .item(2)
        .children.item(0).innerHTML;

    // Check which button is clicked (+ or -)
    if (event.target.classList.contains("fa-plus")) {
        // Quantity num is before the plus icon
        const currentItemQuantity =
            event.target.parentElement.previousElementSibling;
        currentItemQuantity.value++;

        updateTotalPrice(parseInt(currentItemPrice), "plus");
    } else if (event.target.classList.contains("fa-minus")) {
        // Quantity num is after the minus icon
        const currentItemQuantity =
            event.target.parentElement.nextElementSibling;

        // Delete item from cart if the quantity is 0
        if (currentItemQuantity.value == 1) {
            let confirmDelete = confirm(
                "Are you sure you want to delete the item from the cart?"
            );

            if (confirmDelete) {
                currentRow.remove();
                updateCartDB(currentRowId, 0, "remove");
            }
        } else if (currentItemQuantity.value > 1) {
            currentItemQuantity.value--;
        }

        updateTotalPrice(parseInt(currentItemPrice), "minus");
    }
}

function updateTotalPrice(price, flag) {
    let currentPrice = parseFloat(
        totalPrice.innerHTML.replace(/[^0-9-.]/g, "")
    );

    if (flag == "plus") {
        totalPrice.innerHTML = (currentPrice + price).toLocaleString();
    } else {
        totalPrice.innerHTML = (currentPrice - price).toLocaleString();
    }

    subTotalPrice.innerHTML = totalPrice.innerHTML;
}

let tbody = document.querySelector("tbody");
tbody.addEventListener("click", updateProductQuantity);

function checkout() {
    let confirmCheckout = confirm("Are you sure you want to checkout?");
    if (confirmCheckout) {
        window.location.href = "checkout.php?total=" + totalPrice.innerHTML;
    }
}
