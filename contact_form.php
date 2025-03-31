<?php
session_start();
include_once 'header.php';

// Default values to retain form input after submission
$name = $phone = $event_type = $email = $budget = $message = '';
$errors = [];

// Check if form is submitted (for backend validation if needed)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation logic (same as JavaScript but for backend)
    if (empty($_POST['name'])) $errors['name'] = "Full name is required";
    if (empty($_POST['phone']) || !preg_match('/^\d{10}$/', $_POST['phone'])) $errors['phone'] = "Valid phone number required";
    if (empty($_POST['event_type'])) $errors['event_type'] = "Please select an event type";
    if (empty($_POST['budget'])) $errors['budget'] = "Please select a budget";
    if (empty($_POST['message'])) $errors['message'] = "Message cannot be empty";

    // If no errors, process the form (save to database or send email)
    if (empty($errors)) {
        echo "<script>alert('Form submitted successfully!');</script>";
    }
}
?>

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-50">
        <div class="col">
            <form method="POST" action="" id="eventForm">
                <h2 class="text-center mb-4">Event Inquiry</h2>
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo htmlspecialchars($name); ?>">
                    <small class="text-danger" id="nameError"><?php echo $errors['name'] ?? ''; ?></small>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone number" value="<?php echo htmlspecialchars($phone); ?>">
                    <small class="text-danger" id="phoneError"><?php echo $errors['phone'] ?? ''; ?></small>
                </div>
                <div class="mb-3">
                    <select name="event_type" class="form-select">
                        <option value="">Select event type</option>
                        <option value="Wedding" <?php echo ($event_type == 'Wedding') ? 'selected' : ''; ?>>Wedding</option>
                        <option value="Corporate" <?php echo ($event_type == 'Corporate') ? 'selected' : ''; ?>>Corporate</option>
                    </select>
                    <small class="text-danger" id="eventTypeError"><?php echo $errors['event_type'] ?? ''; ?></small>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email address (Optional)" value="<?php echo htmlspecialchars($email); ?>">
                </div>
                <div class="mb-3">
                    <select name="budget" class="form-select">
                        <option value="">Select budget</option>
                        <option value="Low" <?php echo ($budget == 'Low') ? 'selected' : ''; ?>>Low</option>
                        <option value="Medium" <?php echo ($budget == 'Medium') ? 'selected' : ''; ?>>Medium</option>
                        <option value="High" <?php echo ($budget == 'High') ? 'selected' : ''; ?>>High</option>
                    </select>
                    <small class="text-danger" id="budgetError"><?php echo $errors['budget'] ?? ''; ?></small>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control" rows="4" placeholder="Your message"><?php echo htmlspecialchars($message); ?></textarea>
                    <small class="text-danger" id="messageError"><?php echo $errors['message'] ?? ''; ?></small>
                </div>
                <button type="submit" class="btn btn-dark w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="validation.js"></script>
<?php include 'footer.php'; ?>
