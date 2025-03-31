<!-- About.php -->
<?php
include_once("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .about-section {
            padding: 60px 20px;
            background: #343a40;
            color: white;
            text-align: center;
        }
        .team-section {
            padding: 50px 20px;
        }
        .team-card {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .team-card img {
            width: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .contact-section {
            padding: 40px 20px;
            background: #222;
            color: white;
            text-align: center;
        }
        .contact-section a {
            color: #bbb;
            text-decoration: none;
        }
        .contact-section a:hover {
            color: white;
        }
    </style>
</head>
<body>

    <!-- About Us Section -->
    <section class="about-section">
        <div class="container">
            <h1>About Us</h1>
            <p>We are a passionate team dedicated to providing top-quality services in web development, design, and digital marketing.</p>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="team-section">
        <div class="container">
            <h2 class="text-center">Meet Our Team</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="image/planner1.jpg" alt="Team Member">
                        <h5>John Doe</h5>
                        <p>Founder & CEO</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="image/planner3.jpg" alt="Team Member">
                        <h5>Jane Smith</h5>
                        <p>Lead Developer</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="image/planner3.jpg" alt="Team Member">
                        <h5>Michael Lee</h5>
                        <p>UI/UX Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-section">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Email: <a href="mailto:info@example.com">info@example.com</a></p>
            <p>Phone: +91 98765 43210</p>
            <p>Address: 123, Tech Street, New Delhi, India</p>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

