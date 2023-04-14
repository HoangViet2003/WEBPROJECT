async function deleteUser(id) {
    let confirmDelete = confirm(
        "Are you sure you want to delete the user from the database? This will delete all the user's data."
    );

    if (confirmDelete) {
        const data = { id, method: "delete" };
        await axios({
            url: `http://localhost:8000/api/users/${id}`,
            data: data,
            method: "DELETE",

            success: function (result) {
                if (result == 1) {
                    alert("User deleted successfully");
                    // window.location.href = "usersAdmin.php";
                } else {
                    alert("Fail to delete user. Error: " + result);
                }
            },
        })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

async function getAllUser() {
    await axios({
        url: "http://localhost:8000/api/users",
        method: "GET",
        headers: {
            "Authorization ":
                "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDk0NDg4LCJleHAiOjE2ODE0OTgwODgsIm5iZiI6MTY4MTQ5NDQ4OCwianRpIjoianJQTnpURkFwbXljNklWdyIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.z_DC3gP4_gsZA3Re6rq5RhCiw5xLHBAvOD6yPx_iJdQ",
        },
    })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
        
}

getAllUser()

async function updateUser(id = 3){
    let name = $("user_name").val();
    let email = $("email").val();
    let role = $("role").val();

    var form_data = new FormData();
    form_data.append("name", name);
    form_data.append("email", email);
    form_data.append("is_admin", 1);
    axios({
        url: `http://localhost:8000/api/users/3`,
        method: "PUT",
        data:  JSON.stringify({
            full_name: "test",
            email: "test@example.com",
            is_admin: true,
        }),
        headers: {
            "Authorization ":
                "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDk2MzEyLCJleHAiOjE2ODE0OTk5MTIsIm5iZiI6MTY4MTQ5NjMxMiwianRpIjoiRHJPbE9tVG9FcGM5WTFYSSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.pvFSwVDUzGIttCphvLVdurBR9KBU5U2Wvat_YVymaxo",
        },
        success: function (response) {
            console.log(response);
            alert("User updated successfully");
        },
    });
}

$(document).ready(function (e,id=4) {
    $("#userform").on("submit", async function (e) {
        e.preventDefault();
        $("body").toggleClass("loading");

        // Get form inputs
        let name = $("#user_name").val();
        let email = $("#email").val();
        let role = $("#role").val();
    
        // Check if the form is for updating or creating a new product
        if (!document.getElementById("id")) {

            var form_data = new FormData();
            form_data.append("full_name", name);
            form_data.append("email", email);
            form_data.append("role", 1);
            await axios({
                    url: `http://localhost:8000/api/users/${id}`,
                    method: "put",
                    data: JSON.stringify({
                        full_name: "test",
                        email: "test@example.com",

                        is_admin: true,
                    }),

                    headers: {
                        "Content-Type": "application/json",
                        "Authorization ":
                            "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDk2MzEyLCJleHAiOjE2ODE0OTk5MTIsIm5iZiI6MTY4MTQ5NjMxMiwianRpIjoiRHJPbE9tVG9FcGM5WTFYSSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.pvFSwVDUzGIttCphvLVdurBR9KBU5U2Wvat_YVymaxo",
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
