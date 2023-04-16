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

function checkTokenExpiration() {
    const expiresAt = localStorage.getItem("expires_at");

    if (expiresAt) {
        const now = Date.now();
        const expiresIn = expiresAt - now;

        if (expiresIn < 0) {
            // Token has expired, log the user out
            alert("Your session has expired! Please login again!");
            localStorage.clear();
            window.location.href = "http://localhost:8000/login";
        } else {
            // Token is still valid, set the timer to check again in 1 second
            timerId = setTimeout(checkTokenExpiration, 1000);
        }
    }
}

let timerId = null;

// Call the function when the user logs in or the page loads
checkTokenExpiration();

// Attach an event listener to the beforeunload event to clear the timer
window.addEventListener("beforeunload", function () {
    if (timerId) {
        clearTimeout(timerId);
    }
});