const token = localStorage.getItem("access_token");
const pathArray = window.location.pathname.split("/");
const user_id = pathArray[pathArray.length - 1];





window.onload = function start() {
 
    getAllUsers(function (users) {
        renderUsers();
        //  users.data.map(function (user) {
        //      if (user.id === user_id) {
        //          // return document.getElementById("user_name").value = user.full_name;
        //          console.log(user);
        //      }
        //  });
         
    });
       getUserById();
};
let users = [];
async function getAllUsers(callback) {
    await axios({
        url: "http://localhost:8000/api/users",
        method: "GET",
        headers: {
            "Authorization ": `Bearer ${token}`,
        },
    })
        .then(function (response) {
            users = response.data;
            console.log(users.data);
            users.data.map(function (user) {
                if(user.id === user_id){
                    document.getElementById("user_name").value = user.full_name;
                }
            });
            //    return users
        })
        .then(callback)
        .catch(function (error) {
            console.log(error);
        });
}

async function getUserById(){
    // users.data.map(function (user) {
    //     if(user.id === user_id){
    //         document.getElementById("user_name").value = user.full_name;
    //     }
    // });
   
}


async function renderUsers() {
    //  users.data.map(function (user) {
         if (users.data.id === user_id) {
             // return document.getElementById("user_name").value = user.full_name;
             console.log(users);
         }
    //  });

    var listUserBlock = document.querySelector("#tables-user");
    var htmls = users.data.map(function (user) {
        return `<tr>
                  <td>${user.id}</td>
                  <td>${user.full_name}</td>
                  <td>${user.email}</td>
                  <td>${user.is_admin}</td>
                </tr>`;
    });

    listUserBlock.innerHTML = htmls.join("");
}


async function deleteUser(id = user_id) {
    let confirmDelete = confirm(
        "Are you sure you want to delete the user from the database? This will delete all the user's data."
    );

    if (confirmDelete) {
        const data = { id, method: "delete" };
        await axios({
            url: `http://localhost:8000/api/users/${id}`,
            data: data,
            method: "DELETE",
            headers: {
                "Authorization ": `Bearer ${token}`,
            },

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


$(document).ready(function (e, id = user_id) {
    $("#userform").on("submit", async function (e) {
        e.preventDefault();
        $("body").toggleClass("loading");

        // Get form inputs
        let name = $("#user_name").val();
        let email = $("#email").val();
        let role = $("#role").val();
        let is_admin = false;
        if(role === 1) return is_admin = true;
        // Check if the form is for updating or creating a new product
        if (!document.getElementById("id")) {
          
            await axios({
                url: `http://localhost:8000/api/users/${id}`,
                method: "put",
                data: JSON.stringify({
                    full_name: name,
                    email: email,

                    is_admin: is_admin,
                }),

                headers: {
                    "Content-Type": "application/json",
                    "Authorization ":
                        `Bearer ${token}`,
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
