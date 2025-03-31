<?php
include_once("header.php");
?>

<br>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <!-- Image Section -->
        <div class="col-lg-6 d-flex justify-content-center">
            <img  style="width:100%;Height:100%" src="https://i.pinimg.com/736x/84/64/b0/8464b0bf53a4f20a9aa0ee4f14b21e4a.jpg" 
                 alt="Register Image" 
                 class="img-fluid rounded shadow-lg"
                 style="max-width: 105%; height: auto;">
        </div>

        <!-- Registration Form Section -->
        <div class="col-lg-6">
            <div class="p-4 shadow-lg rounded bg-white">
                <h3 class="text-center mb-3">Register</h3>

                <form id="registerForm" action="register.php" method='post' enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name1" class="form-label">Fullname:</label>
                        <input type="text" class="form-control" id="name1" placeholder="Enter name" name="fullname">
                        <small id="nameError" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        <small id="emailError" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                        <small id="passwordError" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="cpwd" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="cpswd">
                        <small id="confirmPasswordError" class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="mn1" class="form-label">Mobile Number:</label>
                        <input type="number" class="form-control" id="mn1" placeholder="Enter Mobile number" name="mobile">
                        <small id="mobileError" class="text-danger"></small>
                    </div>

                    <button type="submit" class="btn w-100 text-white bg-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<script src="Registration.validate.js"></script>
<?php
include_once("footer.php");
?>
