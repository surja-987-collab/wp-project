<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book'])) {
    require_once 'db_connection.php';

    // Retrieve form data
    $booking_id = $_POST["booking_id"] ?? "";
    $booking_no = $_POST["booking_no"] ?? "";
    $name = $_POST["name"] ?? "";
    $mobile = $_POST["mobile"] ?? "";
    $booking_date = $_POST["booking_date"] ?? "";
    $amount = $_POST["amount"] ?? "";
    $status = "Pending";
    $payment_status = "Unpaid";

    // Save booked details in session
    $_SESSION['booked_event'] = [
        "booking_id" => $booking_id,
        "booking_no" => $booking_no,
        "name" => $name,
        "mobile" => $mobile,
        "booking_date" => $booking_date,
        "amount" => $amount
    ];

    // Check if booking_id already exists
    $sql_check = "SELECT booking_id FROM book_event WHERE booking_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $booking_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $error = "Error: Booking ID already exists. Please use a different ID.";
    } else {
        // Insert new booking
        $sql = "INSERT INTO book_event (booking_id, name, booking_no, mobile, booking_date, amount, status, payment_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssdss", $booking_id, $name, $booking_no, $mobile, $booking_date, $amount, $status, $payment_status);

        if ($stmt->execute()) {
            header("Location: MyBooking.php"); // Redirect to booking page
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
}
?>

<?php include_once 'header.php'; ?>

<script>
function validateForm() {
    let isValid = true;

    // Get form inputs
    let bookingId = document.getElementById("booking_id").value.trim();
    let bookingNo = document.getElementById("booking_no").value.trim();
    let name = document.getElementById("name").value.trim();
    let mobile = document.getElementById("mobile").value.trim();
    let bookingDate = document.getElementById("booking_date").value.trim();
    let amount = document.getElementById("amount").value.trim();

    // Clear previous errors
    document.getElementById("booking_id_error").innerText = "";
    document.getElementById("booking_no_error").innerText = "";
    document.getElementById("name_error").innerText = "";
    document.getElementById("mobile_error").innerText = "";
    document.getElementById("booking_date_error").innerText = "";
    document.getElementById("amount_error").innerText = "";

    // Validate Booking ID
    if (bookingId === "") {
        document.getElementById("booking_id_error").innerText = "Booking ID is required";
        isValid = false;
    }

    // Validate Booking No
    if (bookingNo === "") {
        document.getElementById("booking_no_error").innerText = "Booking No is required";
        isValid = false;
    }

    // Validate Name
    if (name === "") {
        document.getElementById("name_error").innerText = "Full name is required";
        isValid = false;
    }

    // Validate Mobile (10 digits only)
    let phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(mobile)) {
        document.getElementById("mobile_error").innerText = "Valid 10-digit phone number required";
        isValid = false;
    }

    // Validate Booking Date
    if (bookingDate === "") {
        document.getElementById("booking_date_error").innerText = "Booking date is required";
        isValid = false;
    }

    // Validate Amount (must be positive)
    if (amount === "" || isNaN(amount) || amount <= 0) {
        document.getElementById("amount_error").innerText = "Enter a valid amount greater than zero";
        isValid = false;
    }

    return isValid;
}
</script>

<div class="container mt-5">
    <h2 class="text-center">Book a Venue</h2>

    <form method="POST" id="eventForm" class="w-50 mx-auto p-4 border rounded" onsubmit="return validateForm()">
        <div class="mb-3">
            <label>Booking ID:</label>
            <input type="text" name="booking_id" id="booking_id" class="form-control" placeholder="Enter Booking ID">
            <small id="booking_id_error" class="text-danger"></small>
        </div>

        <div class="mb-3">
            <label>Booking No:</label>
            <input type="text" name="booking_no" id="booking_no" class="form-control" placeholder="Enter Booking No">
            <small id="booking_no_error" class="text-danger"></small>
        </div>

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
            <small id="name_error" class="text-danger"></small>
        </div>

        <div class="mb-3">
            <label>Mobile:</label>
            <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number">
            <small id="mobile_error" class="text-danger"></small>
        </div>

        <div class="mb-3">
            <label>Booking Date:</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control">
            <small id="booking_date_error" class="text-danger"></small>
        </div>

        <div class="mb-3">
            <label>Amount:</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
            <small id="amount_error" class="text-danger"></small>
        </div>

        <button type="submit" class="btn btn-dark w-100" name="book">Book Now</button>
    </form>

    <?php if (isset($error)) echo "<p class='text-danger text-center'>$error</p>"; ?>
</div>

<?php include 'footer.php'; ?>
