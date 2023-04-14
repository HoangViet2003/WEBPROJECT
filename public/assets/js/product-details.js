function deleteProduct(id) {
    let confirmDelete = confirm(
        "Are you sure you want to delete the item with from the cart?"
    );

    if (confirmDelete) {
        const data = { id, method: "delete" };
        axios({
            url: `http://localhost:8000/api/products/${id}`,
            method: "delete",
            data: data,
            headers: {
                "Authorization ":
                    "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDc5MTI2LCJleHAiOjE2ODE0ODI3MjYsIm5iZiI6MTY4MTQ3OTEyNiwianRpIjoiNmhHbE8yejNDeFkxa2VZYSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.1z8qF0lBw_J6rB_u3FxyU-sitQI6W-laRhhlOrTK_-M",
            },
            success: function (response) {
                console.log(response);
                alert("Product deleted successfully");
                // window.location.href = "productsAdmin.php";
            },
        });
    }
}

function updateProduct(id =3) {
    // Get updated informatin
    let name = $("#product_name").val();
    let description = $("#description").val();
    let price = $("#price").val();
    let quantity = $("#quantity").val();
    let category = $("#category").val();

    var form_data = new FormData();
    form_data.append("name", name);
    form_data.append("description", description);
    form_data.append("price", price);
    form_data.append("quantity", quantity);
    form_data.append("rating", 5);
    form_data.append("category_id", 1);



    axios({
        url: `http://localhost:8000/api/products/${id}`,
        type: "PUT",
        data: form_data,
        headers: {
            "Authorization ":
                "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDc5MTI2LCJleHAiOjE2ODE0ODI3MjYsIm5iZiI6MTY4MTQ3OTEyNiwianRpIjoiNmhHbE8yejNDeFkxa2VZYSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.1z8qF0lBw_J6rB_u3FxyU-sitQI6W-laRhhlOrTK_-M",
        },
        success: function (response) {
            console.log(response);
            alert("Product updated successfully");
            // window.location.href = "productsAdmin.php";
        },
    });
}

$(document).ready(function (e,id=2) {
    $("#productform").on("submit", async function (e) {
        e.preventDefault();
        $("body").toggleClass("loading");

        // Get form inputs
        let name = $("#product_name").val();
        let description = $("#description").val();
        let price = $("#price").val();
        let quantity = $("#quantity").val();
        let category = $("#category").val();

        // Check if the form is for updating or creating a new product
        if (!document.getElementById("id")) {
            let images = document.getElementById("images-input").files;

            var form_data = new FormData();
            form_data.append("name", name);
            form_data.append("description", description);
            form_data.append("price", price);
            form_data.append("quantity", quantity);
            form_data.append("rating", 5);
            form_data.append("category_id", 1);
            for (let i = 0; i < images.length; i++) {
                form_data.append("images[]", images[i]);
            }

            await axios({
                url: `http://localhost:8000/api/products`,
                method: "post",
                data: form_data,
                headers: {
                    "Authorization ":
                        "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDgzOTc5LCJleHAiOjE2ODE0ODc1NzksIm5iZiI6MTY4MTQ4Mzk3OSwianRpIjoibGcyYlZyWlNpUkVxR2dwSSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.R56hUQfFPvPE9E9O1pdMufpBBK_ZnFoGC9YnuClBDAc",
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



