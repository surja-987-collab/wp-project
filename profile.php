<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include_once 'header.php';
?>

<style>
/* Profile Picture */
.profile-picture {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    overflow: hidden;
    position: relative;
    background-color: #222;
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.error-message {
    color: red;
    font-size: 12px;
}
</style>

<div class="container mt-5">

    <!-- Bootstrap Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
        </li>
    </ul>

    <div class="tab-content mt-4" id="myTabContent">

        <!-- ✅ Profile Section -->
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card border-secondary shadow-sm">
                <div class="card-body">
                    <h2 class="text-dark">Profile</h2>
                    <p class="text-secondary">Update your account details</p>

                    <!-- Profile Picture Upload -->
                    <div class="text-center mb-3">
                        <div class="profile-picture" onclick="uploadProfilePicture()">
                            <img id="profilePicturePreview" src="default-avatar.png" alt="Profile Picture">
                        </div>
                    </div>
                    
                    <input type="file" id="profilePictureInput" accept="image/*">

                    <form id="profileForm">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="Full Name">
                            <label for="name">Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="gender">
                                <option value="Female" selected>Female</option>
                                <option value="Male">Male</option>
                                <option value="Other">Other</option>
                            </select>
                            <label for="gender">Gender</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="dob">
                            <label for="dob">Date of Birth</label>
                        </div>

                        <button class="btn btn-dark w-100" type="submit">Update Profile</button>
                    </form>

                    <button class="btn btn-outline-danger w-100 mt-3">Delete Account</button>
                </div>
            </div>
        </div>

        <!-- ✅ Registration Section -->
        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
            <div class="p-4 shadow-lg rounded bg-white">
                <h3 class="text-center mb-3">Register</h3>

                <form id="registerForm" action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number:</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
                    </div>

                    <button type="submit" class="btn btn-dark w-100">Register</button>
                </form>
            </div>
        </div>

    </div>

</div>

<script>
    // Profile Picture Preview Function
    function uploadProfilePicture() {
        document.getElementById('profilePictureInput').click();
    }

    document.getElementById('profilePictureInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePicturePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?php
include_once 'footer.php';
?>
