async function deleteUser(id) {
    let confirmDelete = confirm(
        "Are you sure you want to delete the user from the database? This will delete all the user's data."
    );

    const data = { id, method: "delete" };

    if (confirmDelete) {
        await axios({
            url: `http://localhost:8000/api/users/${id}`,
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
                "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjgxNDgzOTc5LCJleHAiOjE2ODE0ODc1NzksIm5iZiI6MTY4MTQ4Mzk3OSwianRpIjoibGcyYlZyWlNpUkVxR2dwSSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.R56hUQfFPvPE9E9O1pdMufpBBK_ZnFoGC9YnuClBDAc",
        },
    })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}

