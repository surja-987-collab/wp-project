<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style>
        .custom-navbar {
            background-color: #4CAF50 !important; /* Green */
        }
        .custom-footer {
            background-color: #1E1E1E !important; /* Dark Gray */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">EVENTS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="venue.php">Venues</a></li>
                <li class="nav-item"><a class="nav-link" href="EventPlanner.php">Events Planner</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="ContactUs.php">Contact</a></li>

                <?php if (isset($_SESSION['user'])): ?>
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="images/planner1.jpg" class="rounded-circle me-2" alt="User Avatar" width="30" height="30"> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2 shadow-lg rounded" style="width: 220px;">
                            <!-- Profile Info -->
                            <li class="text-center">
                                <img src="images/planner1.jpg" class="rounded-circle mb-2" alt="User Avatar" width="50" height="50">
                                <p class="fw-bold mb-0"><?= $_SESSION['user']; ?></p>
                                <p class="text-muted small"><?= $_SESSION['user_phone'] ?? '+977 XXXXXXXXXX'; ?></p>
                            </li>
                            <li><hr class="dropdown-divider"></li>

                            <!-- Menu Options -->
                            <li><a class="dropdown-item d-flex align-items-center" href="dashboard.php"><i class="fas fa-home me-2"></i> Dashboard</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="profile.php"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="vendor-apply.php"><i class="fas fa-exchange-alt me-2"></i> Apply as Vendor</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger d-flex align-items-center" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Log out</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- jQuery Script to Fix Dropdown -->
<script>
$(document).ready(function() {
    $('.dropdown-toggle').dropdown();
});
</script>

</body>
</html>
