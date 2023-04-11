function deleteUser(id) {
  let confirmDelete = confirm(
    "Are you sure you want to delete the user from the database? This will delete all the user's data."
  );

  const data = { id, method: "delete" };

  if (confirmDelete) {
    $.ajax({
      url: "userActions.php",
      type: "POST",
      data: data,
      success: function (result) {
        if (result == 1) {
          alert("User deleted successfully");
          window.location.href = "usersAdmin.php";
        } else {
          alert("Fail to delete user. Error: " + result);
        }
      },
    });
  }
}
