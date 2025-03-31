document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registerForm").addEventListener("submit", function (event) {
        let name = document.getElementById("name1").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("pwd").value.trim();
        let confirmPassword = document.getElementById("cpwd").value.trim();
        let mobile = document.getElementById("mn1").value.trim();

        let nameError = document.getElementById("nameError");
        let emailError = document.getElementById("emailError");
        let passwordError = document.getElementById("passwordError");
        let confirmPasswordError = document.getElementById("confirmPasswordError");
        let mobileError = document.getElementById("mobileError");

        // Clear previous error messages
        nameError.innerHTML = emailError.innerHTML = passwordError.innerHTML = confirmPasswordError.innerHTML = mobileError.innerHTML = "";

        let isValid = true;

        if (name === "") {
            nameError.innerHTML = "Fullname is required.";
            isValid = false;
        }
        if (email === "" || !/^\S+@\S+\.\S+$/.test(email)) {
            emailError.innerHTML = "Invalid email format.";
            isValid = false;
        }
        if (password.length < 6) {
            passwordError.innerHTML = "Password must be at least 6 characters.";
            isValid = false;
        }
        if (password !== confirmPassword) {
            confirmPasswordError.innerHTML = "Passwords do not match.";
            isValid = false;
        }
        if (!/^\d{10}$/.test(mobile)) {
            mobileError.innerHTML = "Mobile number must be exactly 10 digits.";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Stop form submission if validation fails
        }
    });
});
