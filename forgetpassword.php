<?php include_once 'header.php'; ?>
<!-- <?php session_start(); ?> -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <h2 class="text-center mb-4">Reset Password</h2>

            <!-- Step 1: Enter Email -->
            <form method="POST" id="emailStep">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="Enter your email" name="email" required>
                    <small class="text-danger d-none" id="emailError">Invalid email address!</small>
                </div>
                <button type="button" class="btn btn-dark w-100" onclick="sendOTP()">Send OTP</button>
                <div class="text-center mt-3">
                    <a href="Login.php">← Back to Login</a>
                </div>
            </form>

            <!-- Step 2: Enter OTP -->
            <form method="POST" id="otpStep" class="d-none">
                <div class="mb-3">
                    <label for="otpInput" class="form-label">Enter OTP:</label>
                    <input type="number" class="form-control" id="otpInput" placeholder="Enter OTP" name="OTP" required>
                    <small class="text-danger d-none" id="otpError">OTP must be 6 digits!</small>
                </div>
                <button type="button" class="btn btn-dark w-100" onclick="verifyOTP()">Verify OTP</button>
            </form>

            <!-- Step 3: Reset Password -->
            <form method="POST" id="passwordStep" class="d-none">
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password:</label>
                    <input type="password" class="form-control" id="newPassword" placeholder="New Password" name="password" required>
                    <small class="text-danger d-none" id="passwordError">Password must be at least 6 characters!</small>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirm_password" required>
                    <small class="text-danger d-none" id="confirmPasswordError">Passwords do not match!</small>
                </div>
                <button type="button" class="btn btn-dark w-100" onclick="resetPassword()">Reset Password</button>
            </form>

        </div>
    </div>
</div>

<script>
    function sendOTP() {
        let email = document.getElementById("emailInput").value;
        let emailError = document.getElementById("emailError");

        if (!validateEmail(email)) {
            emailError.classList.remove("d-none");
            document.getElementById("emailInput").classList.add("is-invalid");
            return;
        }

        emailError.classList.add("d-none");
        document.getElementById("emailInput").classList.remove("is-invalid");

        // Simulate sending OTP (Backend logic needed)
        document.getElementById("emailStep").classList.add("d-none");
        document.getElementById("otpStep").classList.remove("d-none");
    }

    function verifyOTP() {
        let otp = document.getElementById("otpInput").value;
        let otpError = document.getElementById("otpError");

        if (otp.length !== 6) {
            otpError.classList.remove("d-none");
            document.getElementById("otpInput").classList.add("is-invalid");
            return;
        }

        otpError.classList.add("d-none");
        document.getElementById("otpInput").classList.remove("is-invalid");

        // Simulate OTP verification
        document.getElementById("otpStep").classList.add("d-none");
        document.getElementById("passwordStep").classList.remove("d-none");
    }

    function resetPassword() {
        let newPassword = document.getElementById("newPassword").value;
        let confirmPassword = document.getElementById("confirmPassword").value;
        let passwordError = document.getElementById("passwordError");
        let confirmPasswordError = document.getElementById("confirmPasswordError");

        if (newPassword.length < 6) {
            passwordError.classList.remove("d-none");
            document.getElementById("newPassword").classList.add("is-invalid");
            return;
        }

        passwordError.classList.add("d-none");
        document.getElementById("newPassword").classList.remove("is-invalid");

        if (newPassword !== confirmPassword) {
            confirmPasswordError.classList.remove("d-none");
            document.getElementById("confirmPassword").classList.add("is-invalid");
            return;
        }

        confirmPasswordError.classList.add("d-none");
        document.getElementById("confirmPassword").classList.remove("is-invalid");

        // Simulate password reset
        alert("Password Reset Successful! You can now login.");
        window.location.href = "Login.php";
    }

    function validateEmail(email) {
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
</script>

<?php include_once 'footer.php'; ?>
