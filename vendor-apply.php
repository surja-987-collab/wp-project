<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply as Vendor</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/all.css"> -->

    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<!-- Apply as Vendor Button -->
<div class="container mt-5 text-center">
    <button class="btn btn-primary bg-dark text-light" data-bs-toggle="modal" data-bs-target="#vendorModal">Apply as Vendor</button>
</div>

<!-- Apply as Vendor Modal -->
<div class="modal fade" id="vendorModal" tabindex="-1" aria-labelledby="vendorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="vendorModalLabel">Apply Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please fill the following form to become a vendor.</p>
                <form id="vendorForm">
                    <!-- Full Name -->
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="vendor_name" placeholder="e.g. John Doe" required>
                    </div>

                    <!-- Vendor Type -->
                    <div class="mb-3">
                        <label class="form-label">Vendor Type</label>
                        <select class="form-control" name="vendor_type" required>
                            <option value="">Select a vendor type</option>
                            <option value="PROPERTY">PROPERTY</option>
                            <option value="DECORATOR">DECORATOR</option>
                            <option value="TALENT">TALENT</option>
                        </select>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="vendor_email" placeholder="e.g. john@gmail.com" required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+91</span>
                            <input type="tel" class="form-control" name="vendor_phone" placeholder="98XXXXXXXX" required pattern="[0-9]{10}">
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="vendor_message" rows="3" placeholder="e.g. I am writing to express my interest in becoming a vendor..." required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary bg-dark text-light">Save <i class="fas fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#vendorForm").validate({
            rules: {
                vendor_name: "required",
                vendor_type: "required",
                vendor_email: {
                    required: true,
                    email: true
                },
                vendor_phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                vendor_message: "required"
            },
            messages: {
                vendor_name: "Please enter your full name",
                vendor_type: "Please select a vendor type",
                vendor_email: {
                    required: "Please enter your email",
                    email: "Enter a valid email address"
                },
                vendor_phone: {
                    required: "Please enter your phone number",
                    minlength: "Phone number must be 10 digits",
                    maxlength: "Phone number must be 10 digits",
                    digits: "Only numbers are allowed"
                },
                vendor_message: "Please enter your message"
            },
            errorClass: "error"
        });
    });
</script>

</body>
</html>
