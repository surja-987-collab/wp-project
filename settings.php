<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details (Assuming user details are stored in session)
$user_name = $_SESSION['user'] ?? "Guest";
$user_email = $_SESSION['user_email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update Name & Email
    if (isset($_POST['name'])) {
        $_SESSION['user'] = $_POST['name'];
        $user_name = $_POST['name'];
    }

    if (isset($_POST['email'])) {
        $_SESSION['user_email'] = $_POST['email'];
        $user_email = $_POST['email'];
    }

    // Handle Password Change
    if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Dummy user data for authentication (Replace this with database verification)
        $stored_password = "user123"; // Assume this is the existing password

        if ($current_password !== $stored_password) {
            $error_message = "Current password is incorrect!";
        } elseif (strlen($new_password) < 6) {
            $error_message = "New password must be at least 6 characters!";
        } elseif ($new_password !== $confirm_password) {
            $error_message = "New password and confirm password do not match!";
        } else {
            // In a real-world application, update password in the database here
            $success_message = "Password updated successfully!";
        }
    } else {
        $success_message = "Profile updated successfully!";
    }
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Profile Settings</h2>

    <?php if (isset($success_message)) { ?>
        <div class="alert alert-success"><?= $success_message; ?></div>
    <?php } ?>

    <?php if (isset($error_message)) { ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php } ?>

    <!-- Update Name & Email -->
    <form method="post" class="mt-4">
        <div class="mb-3">
            <label class="form-label"><strong>Full Name</strong></label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($user_name); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Email</strong></label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user_email); ?>" required>
        </div>

        
    </form>

    <hr>

    <!-- Change Password Form -->
    <h3 class="mt-4">Change Password</h3>
    <form method="post">
        <div class="mb-3">
            <label class="form-label"><strong>Current Password</strong></label>
            <input type="password" class="form-control" name="current_password" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>New Password</strong></label>
            <input type="password" class="form-control" name="new_password" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Confirm New Password</strong></label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-danger w-100">Update Password</button>
    </form>
</div>

<?php include 'footer.php'; ?>
