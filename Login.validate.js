document.getElementById("loginForm").addEventListener("submit", function (event) {
    let isValid = true;

    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    let emailError = document.getElementById("email_error");
    let passwordError = document.getElementById("password_error");

    // Clear previous errors
    emailError.innerText = "";
    passwordError.innerText = "";

    // Email Validation
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (email === "") {
        emailError.innerText = "Please enter your email";
        document.getElementById("email").classList.add("is-invalid");
        isValid = false;
    } else if (!email.match(emailPattern)) {
        emailError.innerText = "Invalid email format";
        document.getElementById("email").classList.add("is-invalid");
        isValid = false;
    } else {
        document.getElementById("email").classList.remove("is-invalid");
    }

    // Password Validation
    if (password === "") {
        passwordError.innerText = "Please enter your password";
        document.getElementById("password").classList.add("is-invalid");
        isValid = false;
    } else if (password.length < 6) {
        passwordError.innerText = "Password must be at least 6 characters";
        document.getElementById("password").classList.add("is-invalid");
        isValid = false;
    } else {
        document.getElementById("password").classList.remove("is-invalid");
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});
