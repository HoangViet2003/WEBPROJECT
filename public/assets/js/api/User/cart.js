if(!localStorage.getItem("access_token")){
    alert("Please login to access");
    window.location.href = "http://localhost:8080/login";
}


window.onload = getAllCart();

var productName = document.querySelector("#product-name");
var productPrice = document.querySelector("#product-price");
var productImg = document.querySelector("#product-img");
var quantity = document.querySelector("#product-quantity");
var cart;

function getAllCart() {
    try{
        axios
        .get(`https://localhost:8000/api/cartItem`)
        .then((response) =>{
            cart = response.data;
            console.log(cart);

            productName.innerHTML = cart.Name
            productPrice.innerHTML = cart.Price
            productImg.innerHTML = cart.Img

        })
    }catch(error){
        console.log(error)
    }
}


function getCartById() {
    try {
        axios
            .get({ url: `http://localhost:8000/api/carts/1`, header: {
                Authorization: 'Bearer ' + localStorage.getItem('access_token'),
            } })
            .then((response) => {
                console.log(response);
            });
    } catch (error) {
        console.log(error);
    }
}
