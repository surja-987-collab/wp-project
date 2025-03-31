document.getElementById("profileForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let valid = true;

    function validateField(id, errorMessage) {
        let field = document.getElementById(id);
        if (field.value.trim() === "") {
            document.getElementById(id + "Error").innerText = errorMessage;
            valid = false;
        } else {
            document.getElementById(id + "Error").innerText = "";
        }
    }

    validateField("name", "Name is required");
    validateField("gender", "Gender is required");

    let dob = document.getElementById("dob").value;
    let today = new Date().toISOString().split("T")[0];

    if (dob === "" || dob >= today) {
        document.getElementById("dobError").innerText = "Please enter a valid date of birth";
        valid = false;
    } else {
        document.getElementById("dobError").innerText = "";
    }

    if (valid) {
        alert("Profile updated successfully!");
    }
});

// Profile Picture Upload & Preview
document.getElementById("profilePictureInput").addEventListener("change", function(event) {
    let file = event.target.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("profilePicturePreview").src = e.target.result;
            document.getElementById("profilePicturePreview").style.display = "block";
            document.getElementById("uploadIcon").style.display = "none";
        };
        reader.readAsDataURL(file);
    }
});

// Delete Account Button
document.getElementById("deleteAccount").addEventListener("click", function() {
    if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
        alert("Your account has been deleted.");
    }
});
