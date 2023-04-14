var listProduct = document.querySelector("#table-product");

window.onload =  function () {
    if (localStorage.getItem('access_token')) {
      if (localStorage.getItem('is_admin')) {
        window.location.href = 'http://localhost:8000/admin';
      } else {
        window.location.href = 'http://localhost:8000';
      }
    }
  }


async function getProduct() {
    await fetch({url:"http://localhost:8000/api/carts", method: "get", headers: {
                    "Authorization ":
                        "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDQ3MTcyLCJleHAiOjE2ODE0NTA3NzIsIm5iZiI6MTY4MTQ0NzE3MiwianRpIjoiT09pQ284aW5OcUtYZk1IRCIsInN1YiI6IjMiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.G4N_b2OlhqWJ3kA-ML6tC6XiFLASjQ3U_dv6bFnkiEs",
                },})
        .then(function (response) {
            console.log(response)
            return response.json();
        })
       
}

function renderProduct(products) {  
    var listProductBlock = document.querySelector('table-product');
    var htmls = products.map(function (product) {
        return ` <tr>
                  <td style="width: auto">${product.id}</td>
                  <td>${product.img}</td>
                  <td>${product.name}</td>
                  <td>${product.price}</td>
                  <td>${product.quantity}</td>
                </tr>`;
    });
}