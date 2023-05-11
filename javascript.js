document.addEventListener("DOMContentLoaded", () => {
    const formlogin = document.querySelector(".login");

    formlogin.addEventListener("submit", e => {
        if (formlogin.username.value == "admin" && formlogin.password.value == "user") {
            alert("Validation sucessful");
            window.open('Home.php');
        } else {
            alert("validation failed");
        }
    });
});