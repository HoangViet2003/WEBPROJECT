// Show logout button if the user is logged in, else show login button
if (localStorage.getItem("access_token")) {
    document.getElementById("login").style.display = "none";
} else {
    document.getElementById("profile").style.display = "none";
    document.getElementById("logout").style.display = "none";
}

function logout() {
    // Empty the local storage
    localStorage.clear();

    window.location.href = "http://localhost:3000/login";
}
