if (!localStorage.getItem("access_token")) {
    // Show logout button
    alert("You are not logged in. Please login to continue.");
    window.location.href = "http://localhost:8000/login";
}

const token = localStorage.getItem("access_token");

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
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((response) => {
                const user = response.data;
console.log(response)
                if (user.is_admin === true) {
                    // Set attribute selected for the admin option using child nodes
                    $("#admin option:nth-child(1)").attr(
                        "selected",
                        "selected"
                    );
                } else {
                    // Set attribute selected for the user option using child nodes
                    $("#admin option:nth-child(2)").attr(
                        "selected",
                        "selected"
                    );
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
                    console.log("error", error);
                }
            });
    } catch (error) {
        // if error code is 404, alert the user
        $("body").toggleClass("loading");

        console.log("error", error);
    }
}

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
        if (role === 1) {
            is_admin = true;
        }
        // Check if the form is for updating or creating a new product

        // Call api using x-www-form-urlencoded
        await axios({
            url: `http://localhost:8000/api/users/${id}`,
            method: "POST",
            data: JSON.stringify({
                full_name: name,
                email: email,

                is_admin: is_admin,
                _method: "PUT",
                _token: $('meta[name="csrf-token"]').attr("content")
            }),

            headers: {
                "Content-Type": "application/json",
                "Authorization ": `Bearer ${token}`,
                 "X-CSRF-TOKEN": "test",
            },
        })
            .then(function (response) {
                $("body").toggleClass("loading");
                // redirect to products page
                console.log(response);
                // window.location.href = "/users-admin";
                // window.location.href = "/users-admin";
            })
            .catch(function (error) {
                $("body").toggleClass("loading");

                console.log(error);
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
