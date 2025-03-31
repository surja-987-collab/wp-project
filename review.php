<?php
session_start(); // Start session tracking
include_once("header.php");

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

// If not logged in, save current page URL & redirect to login page
if (!$isLoggedIn) {
    $_SESSION['redirect_to'] = "review.php"; // Save current page to session
    header("Location: login.php"); // Redirect to login page
    exit();
}
?>

<br>

<style>
  body {
    background-color: #f5f5f5;
  }
  .review-container {
    max-width: 700px;
    margin: 50px auto;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .star-rating {
    direction: rtl;
    display: inline-flex;
  }
  .star-rating input[type="radio"] {
    display: none;
  }
  .star-rating label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
  }
  .star-rating input[type="radio"]:checked ~ label {
    color: #ffc107;
  }
  .btn {
    background-color: rgb(35, 125, 214);
  }
  .btn:hover {
    background-color: rgb(13, 207, 13);
  }
  .error {
    color: red;
    font-size: 14px;
  }
</style>

<div class="container mt-5 review-container">
  <h1 class="text-center mb-4" style="color: rgb(22, 22, 21);">Review</h1>
  <form id="reviewForm">
    <!-- Event Name -->
    <div class="mb-3">
      <label for="eventName" class="form-label" style="color: black;"><strong>Event Name</strong></label>
      <input type="text" class="form-control" id="eventName" placeholder="Enter Your Event Name">
      <small id="eventNameError" class="error"></small>
    </div>

    <!-- Review Text -->
    <div class="mb-3">
      <label for="reviewText" class="form-label" style="color: black;"><strong>Your Review</strong></label>
      <textarea class="form-control" id="reviewText" rows="4" placeholder="Write your review here..."></textarea>
      <small id="reviewTextError" class="error"></small>
    </div>

    <!-- Rating -->
    <div class="mb-3">
      <label class="form-label" style="color: black;"><strong>Rating</strong></label>
      <div class="star-rating">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5">&#9733;</label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4">&#9733;</label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3">&#9733;</label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2">&#9733;</label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1">&#9733;</label>
      </div>
      <small id="ratingError" class="error"></small>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn w-100 bg-dark text-light"><strong>Submit Review</strong></button>
  </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("reviewForm").addEventListener("submit", function (event) {
        let eventName = document.getElementById("eventName").value.trim();
        let reviewText = document.getElementById("reviewText").value.trim();
        let ratingChecked = document.querySelector("input[name='rating']:checked");

        let eventNameError = document.getElementById("eventNameError");
        let reviewTextError = document.getElementById("reviewTextError");
        let ratingError = document.getElementById("ratingError");

        // Clear previous errors
        eventNameError.innerHTML = reviewTextError.innerHTML = ratingError.innerHTML = "";

        let isValid = true;

        // Validate Event Name
        if (eventName === "") {
            eventNameError.innerHTML = "Event name is required.";
            isValid = false;
        }

        // Validate Review Text
        if (reviewText === "") {
            reviewTextError.innerHTML = "Review cannot be empty.";
            isValid = false;
        } else if (reviewText.length < 10) {
            reviewTextError.innerHTML = "Review must be at least 10 characters.";
            isValid = false;
        }

        // Validate Rating Selection
        if (!ratingChecked) {
            ratingError.innerHTML = "Please select a rating.";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Stop form submission if validation fails
        } else {
            alert("Review submitted successfully!");
        }
    });
});
</script>

<?php include_once("footer.php"); ?>
