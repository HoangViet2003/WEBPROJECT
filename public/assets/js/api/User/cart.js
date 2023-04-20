const token = localStorage.getItem("access_token");

getCartById();



var cartItemSection = document.querySelector("#cart-item-section");
var cartTotal = document.querySelector("#total-price");
var cartSubTotal = document.querySelector("#sub-total-price");
var quantity = document.querySelector("#qty");

console.log(quantity.value)

async function getCartById() {
    try {
        await axios({
            url: "http://localhost:8000/api/carts/23",
            method: "GET",
            headers: {
                Authorization: "Bearer " + localStorage.getItem("access_token"),
            },
        }).then((response) => {
            cart = response.data
            cartItems = response.data.items;
            console.log(cart)
         for(let i = 0; i < cartItems.length; i++) {
                var html = `<tr ></tr>
         <td class="cart_product_img">
          <a href="#" id="product-img"><img src="${cartItems[i].product.images[0].image_url}" alt="Product" /></a>
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
            <input type="number" id="qty" step="1" min="1" max="300" name="quantity"  value="${cartItems[i].quantity}"/>
            <span class="qty-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
           </div>
          </div>
         </td>
        </tr> `;
               
            cartItemSection.innerHTML += html
            };


            cartTotal.innerHTML = cart.total
            cartSubTotal.innerHTML = cart.total
        });
    } catch (error) {
        console.log(error);
    }
}

