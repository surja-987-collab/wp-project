<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $valid_users = [
        "user1@example.com" => ["password" => "user123", "name" => "John Doe"],
        "user2@example.com" => ["password" => "test456", "name" => "Alice Smith"]
    ];

    if (isset($valid_users[$email]) && $valid_users[$email]['password'] === $password) {
        $_SESSION['user'] = $valid_users[$email]['name'];
        $_SESSION['user_email'] = $email;
        $_SESSION['user_logged_in'] = true;

        if ($remember) {
            setcookie("remember_email", $email, time() + (86400 * 30), "/");
        } else {
            setcookie("remember_email", "", time() - 3600, "/");
        }

        echo "<script>
                setTimeout(function(){
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        text: 'Redirecting...',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                }, 500);
              </script>";
    } else {
        $error = "Invalid Email or Password!";
    }
}

$remembered_email = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : '';
?>

<?php include 'header.php'; ?>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card border-secondary shadow">
                <div class="card-body">
                    <form id="loginForm" method="POST">
                        <label class="fw-medium fs-4 mb-3">Login to Your Account</label>

                        <?php if (isset($error)) { ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Login Failed!',
                                    text: '<?= $error; ?>'
                                });
                            </script>
                        <?php } ?>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($remembered_email); ?>">
                            <label>Email address</label>
                            <small class="text-danger" id="email_error"></small>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password">
                            <label>Password</label>
                            <small class="text-danger" id="password_error"></small>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?= $remembered_email ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <div class="row">
                            <div class="col ms-2 text-start">
                                <p><a href="./ForgetPassword.php" class="link-primary">Forget Password?</a></p>
                            </div>
                            <div class="col me-2 text-end">
                                <p><a href="register.php" class="link-primary">Register Account</a></p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="Login.validate.js"></script>
<?php include 'footer.php'; ?>
