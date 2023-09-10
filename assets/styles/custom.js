import './custom.css'
document.addEventListener("DOMContentLoaded", function() {
    var loginLink = document.getElementById("login-link");
    var logoutLink = document.getElementById("logout-link");

    var userIsLoggedIn = true; 
    if (userIsLoggedIn) {
        loginLink.style.display = "none";
        logoutLink.style.display = "block";
    } else {
        loginLink.style.display = "block";
        logoutLink.style.display = "none";
    }
});