<?php include_once "header.php" ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $event_type = trim($_POST['event_type']);
    $email = trim($_POST['email']);
    $budget = trim($_POST['budget']);
    $message = trim($_POST['message']);
    $errors = [];
    
    // Name validation
    if (empty($name)) {
        $errors['name'] = "Full name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors['name'] = "Only letters and spaces allowed.";
    }
    
    // Phone validation
    if (empty($phone)) {
        $errors['phone'] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{9,12}$/", $phone)) {
        $errors['phone'] = "Invalid phone number format.";
    }
    
    // Event type validation
    if (empty($event_type)) {
        $errors['event_type'] = "Please select an event type.";
    }
    
    // Email validation (optional)
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    
    // Budget validation
    if (empty($budget)) {
        $errors['budget'] = "Please select your budget.";
    }
    
    // Message validation
    if (empty($message)) {
        $errors['message'] = "Message cannot be empty.";
    }
    
    // If no errors, process form (e.g., send email or store in database)
    if (empty($errors)) {
        echo "<div class='alert alert-success'>Message sent successfully!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="text-center">Contact</h2>
    <p class="text-center">We are available 24*7 in your service</p>
    
    <div class="row text-center mb-4">
        <div class="col-md-4"><div class="card p-3 bg-dark text-light"><p>📞 Call us</p><p>+91 9764183752</p></div></div>
        <div class="col-md-4"><div class="card p-3 bg-dark text-light"><p>📧 Email us</p><p>support@meroevent.com</p></div></div>
        <div class="col-md-4"><div class="card p-3 bg-dark text-light"><p>📍 Visit us</p><p>Rudramati, Rajesthan</p></div></div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="ratio ratio-4x3" style="height: 100%;">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1659942574455!5m2!1sen!2s"
                    class="border rounded" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="col-md-6">
            <form method="POST" action="">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo htmlspecialchars($name ?? ''); ?>">
                    <small class="text-danger"><?php echo $errors['name'] ?? ''; ?></small>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone number" value="<?php echo htmlspecialchars($phone ?? ''); ?>">
                    <small class="text-danger"><?php echo $errors['phone'] ?? ''; ?></small>
                </div>
                <div class="mb-3  text-light">
                    <select name="event_type" class="form-select">
                        <option value="">Select event type</option>
                        <option value="Wedding" <?php echo ($event_type ?? '') == 'Wedding' ? 'selected' : ''; ?>>Wedding</option>
                        <option value="Corporate" <?php echo ($event_type ?? '') == 'Corporate' ? 'selected' : ''; ?>>Corporate</option>
                    </select>
                    <small class="text-danger"><?php echo $errors['event_type'] ?? ''; ?></small>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email address (Optional)" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <select name="budget" class="form-select">
                        <option value="">Select budget</option>
                        <option value="Low" <?php echo ($budget ?? '') == 'Low' ? 'selected' : ''; ?>>Low</option>
                        <option value="Medium" <?php echo ($budget ?? '') == 'Medium' ? 'selected' : ''; ?>>Medium</option>
                        <option value="High" <?php echo ($budget ?? '') == 'High' ? 'selected' : ''; ?>>High</option>
                    </select>
                    <small class="text-danger"><?php echo $errors['budget'] ?? ''; ?></small>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control" rows="4" placeholder="Your message"><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                    <small class="text-danger"><?php echo $errors['message'] ?? ''; ?></small>
                </div>
                <button type="submit" class="btn btn-primary w-100 bg-dark">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script src="./ContactUs.validate.js"></script>

<?php include_once("footer.php"); ?>
