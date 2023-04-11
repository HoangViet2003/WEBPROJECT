const subTotal = document.getElementById("sub-total-price");
const total = document.getElementById("total-price");

function createOrder(cart_id) {
  // Get the checkout information
  const fullname = document.getElementById("full_name").value;
  const address = document.getElementById("address").value;
  const phone_number = document.getElementById("phone_number").value;
  const note = document.getElementById("comment").value;

  let totalPurchase = parseFloat(total.innerHTML.replace(/[^0-9-.]/g, ""));

  // create order json
  const order = {
    address: address,
    phone_number: phone_number,
    note: note,
    total: totalPurchase,
    cart_id: cart_id,
  };

  // create order
  $.ajax({
    url: "order-create.php",
    type: "POST",
    data: order,
    success: function (response) {
      console.log(response);
    },
  });

  // clear cart

  // redirect to order success page

  // redirect to order tracking page
  window.location.href = "orderTracking.php";
}

