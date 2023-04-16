console.log("test");

$(document).ready(function () {
    // Get the id of the product from the url
    const url = window.location.href;
    const id = url.substring(url.lastIndexOf("/") + 1);

    // If the id exists, get the product from the api
    if (id && id !== "user-detail-admin") {
        $("body").toggleClass("loading");
        try {
            axios
                .get(`http://localhost:8000/api/users/${id}`, {
                    headers: {
                        "Authorization ": `Bearer ${token}`,
                    },
                })
                .then((response) => {
                    const user = response.data;
                    console.log(response);
                    if (user.is_admin === true) {
                        $("#admin").val(1);
                    } else {
                        $("#admin").val(0);
                    }
                    // Set the values of the input fields

                    $("#user_name").val(user.full_name);
                    $("#email").val(user.email);

                    // window.location.href = "users-admin";
                    $("body").toggleClass("loading");
                })
                .catch((error) => {
                    $("body").toggleClass("loading");

                    if (error.response?.status === 404) {
                        alert("user not found");
                        window.location.href = "/users-admin";
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
    } else {
        // Display none the delete button
        $("#delete-btn").css("display", "none");

        // Display none the input and label
        $("#product_id").css("display", "none");
        $("#product_id_label").css("display", "none");

        // Change the text of the submit button to Create product
        $("#create-product").text("Create product");
    }
});

$(document).ready(function (e) {
    $("#userform").on("submit", async function (e) {
        e.preventDefault();
        $("body").toggleClass("loading");
        const url = window.location.href;
        const id = url.substring(url.lastIndexOf("/") + 1);
        // Get form inputs
        let name = $("#user_name").val();
        let email = $("#email").val();
        let role = $("#admin").val();
        let is_admin = false;
        if (role === 1) return (is_admin = true);
        // Check if the form is for updating or creating a new product

        await axios({
            url: `http://localhost:8000/api/users/${id}`,
            method: "put",
            data: JSON.stringify({
                full_name: "test",
                email: "test@gmail.com",

                is_admin: false,
            }),

            headers: {
                "Content-Type": "application/json",
                "Authorization ": `Bearer ${token}`,
            },
        })
            .then(function (response) {
                $("body").toggleClass("loading");
                // redirect to products page
                console.log(response);
                window.location.href = "/users-admin";
            })
            .catch(function (error) {
                console.log(error);

                $("body").toggleClass("loading");
            });
    });
});

async function deleteUser() {
    let confirmDelete = confirm(
        "Are you sure you want to delete the user from the database? This will delete all the user's data."
    );

    if (confirmDelete) {
        const url = window.location.href;
        const id = url.substring(url.lastIndexOf("/") + 1);
        await axios({
            url: `http://localhost:8000/api/users/${id}`,
            method: "DELETE",
            headers: {
                "Authorization ": `Bearer ${token}`,
            },
        })
            .then(function (response) {
                console.log(response);
                window.location.href = "/users-admin";
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}
