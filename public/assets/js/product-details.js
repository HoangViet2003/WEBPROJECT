const token = localStorage.getItem("access_token");
const pathArray = window.location.pathname.split("/");
const product_id = pathArray[pathArray.length - 1];

function deleteProduct(id = product_id) {
    let confirmDelete = confirm("Are you sure you want to delete the product?");

    if (confirmDelete) {
        const data = { id, method: "delete" };
        axios({
            url: `http://localhost:8000/api/products/${id}`,
            method: "delete",
            data: data,
            headers: {
                "Authorization ": `Bearer ${token}`,
            },
            success: function (response) {
                console.log(response);
                alert("Product deleted successfully");
                // window.location.href = "productsAdmin.php";
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
            "Authorization ": `Bearer ${token}`,
        },
        success: function (response) {
            console.log(response);
            alert("Product updated successfully");
            // window.location.href = "productsAdmin.php";
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
        if (!product_id) {
            let images = document.getElementById("images-input").files;
            console.log("test")
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
                    "Authorization ": `Bearer ${token}`,
                },
            })
                .then(function (response) {
                    // $("body").toggleClass("loading");
                    console.log(response);
                    // redirect to products page
                    // window.location.href = "productsAdmin.php";
                })
                .catch(function (error) {
                    console.log(error);

                    // $("body").toggleClass("loading");
                });
        } else {
            // let id = document.getElementById("id").value;
            updateProduct(product_id);
        }
    });
});

async function searchProduct() {
    await axios({
        url: "http://localhost:8000/api/productSearch?name=test&page=1",
        method: "search",
        headers: {
            name: "test",
        },
    });
    let name = document.getElementById("name").value;
    searchProduct(name);
}
