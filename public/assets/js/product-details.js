function deleteProduct(id) {
    let confirmDelete = confirm(
        "Are you sure you want to delete the item with from the cart?"
    );

    if (confirmDelete) {
        const data = { id, method: "delete" };
        $.ajax({
            url: "product-actions.php",
            type: "POST",
            data: data,
            success: function (response) {
                console.log(response);
                alert("Product deleted successfully");
                window.location.href = "productsAdmin.php";
            },
        });
    }
}

function updateProduct(id) {
    // Get updated informatin
    let name = $("#product_name").val();
    let description = $("#description").val();
    let price = $("#price").val();
    let quantity = $("#quantity").val();
    let category = $("#category").val();

    const data = {
        id,
        name,
        price,
        quantity,
        description,
        category,
        method: "update",
    };

    $.ajax({
        url: "product-actions.php",
        type: "POST",
        data: data,
        success: function (response) {
            console.log(response);
            alert("Product updated successfully");
            window.location.href = "productsAdmin.php";
        },
    });
}

$(document).ready(function (e) {
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
                url: "http://localhost:8000/api/products",
                method: "post",
                data: form_data,
                headers: {
                    "Authorization ":
                        "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDQ0MzQ4LCJleHAiOjE2ODE0NDc5NDgsIm5iZiI6MTY4MTQ0NDM0OCwianRpIjoiemRMVnpQQURMWTFCclRTMiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.vh-A0oujhzdMoun57L_Ni4Or8IXaGzYeP2ZYnolZPsE",
                },
            })
                .then(function (response) {
                    $("body").toggleClass("loading");

                    // redirect to products page
                    window.location.href = "productsAdmin.php";
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
