<?php include_once 'header.php' ?>

<div class="container mt-5 mb-3">
    <div class="row">
        <div class="col-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/bday 1.jpg" class="rounded d-block w-50 mx-auto" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/bday 1.jpg" class="rounded d-block w-50 mx-auto" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/bday 1.jpg" class="rounded d-block w-50 mx-auto" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">

            <h6 class="mt-2">Description - </h6>
            <p class="mt-2 text-black">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga sequi labore
                consectetur cumque illo esse dolor sit ea sint accusamus et, impedit fugit
                perferendis, saepe ut consequatur reprehenderit? Neque, libero.
            </p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6">
            <h6 class="ms-1">Enter a gift card, voucher or promotional code </h6>
            <div class="input-group mb-3">
                <input type="text" class="form-control border-dark" placeholder="Enter Coupen Code..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn border-light bg-dark  text-white w-25 fw-small" type="button" id="button-addon2">Apply</button>
            </div>
        </div>
        <div class="col-6">
            <h6>Coupen Code : NewYearOffer</h6>
            <h6>Total : 250</h6>

            <h6>Code is not valid</h6>
            <a href="book_event.php"><button  class="btn border-dark bg-dark text-white w-25 fw-medium " type="button">Book Now</button></a>
            <a href="food.php"><button  class="btn border-dark bg-dark text-white w-25 fw-medium " type="button">Food</button></a>
            
            <!-- Leave Review Button (Opens Modal) -->

        </div>
    </div>
 
</div>
<?php

// Handle review submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $review = [
        "name" => $_SESSION['user_name'] ?? "Guest",
        "rating" => $_POST['rating'] ?? 5, // Default to 5 stars
        "message" => htmlspecialchars($_POST['review_message']),
        "date" => date("Y-m-d H:i:s")
    ];

    $_SESSION['reviews'][] = $review; // Store reviews in session (temporary)
}

$reviews = $_SESSION['reviews'] ?? []; // Get stored reviews
?>



<!-- Include Font Awesome for star icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container mt-5">
    <h2 class="text-center">Event Reviews ⭐</h2>

    <!-- Review Form -->
    <?php if (isset($_SESSION['user'])): ?>
        <form method="POST" class="w-50 mx-auto p-4 border rounded">
            <label class="fw-bold">Rate This Event:</label>
            <div class="rating mb-3">
                <input type="radio" name="rating" value="5" id="star5" checked><label for="star5" class="fas fa-star"></label>
                <input type="radio" name="rating" value="4" id="star4"><label for="star4" class="fas fa-star"></label>
                <input type="radio" name="rating" value="3" id="star3"><label for="star3" class="fas fa-star"></label>
                <input type="radio" name="rating" value="2" id="star2"><label for="star2" class="fas fa-star"></label>
                <input type="radio" name="rating" value="1" id="star1"><label for="star1" class="fas fa-star"></label>
            </div>

            <label class="fw-bold">Write a Review:</label>
            <textarea name="review_message" class="form-control mb-3" placeholder="Write your review here..." required></textarea>
            <button type="submit" name="submit_review" class="btn btn-primary w-100">Submit Review</button>
        </form>
    <?php else: ?>
        <p class="text-center text-danger">Login to submit a review.</p>
    <?php endif; ?>

    <hr>

    <!-- Display Reviews -->
    <h3 class="text-center mt-4">What People Say</h3>
    <div class="mt-3">
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="border p-3 mb-2">
                    <strong><?php echo $review['name']; ?></strong>
                    <p>
                        <?php for ($i = 1; $i <= 1; $i++): ?>
                            <i class="fas fa-star <?php echo $i <= $review['rating'] ? 'text-warning' : 'text-muted'; ?>"></i>
                        <?php endfor; ?>
                    </p>
                    <p><?php echo $review['message']; ?></p>
                    <small class="text-muted"><?php echo $review['date']; ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No reviews yet. Be the first to write one!</p>
        <?php endif; ?>
    </div>
</div>

<!-- Add some CSS for star styling -->
<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
}
.rating input {
    display: none;
}
.rating label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    padding: 0 5px;
}
.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: gold;
}
</style>


<?php include_once 'footer.php' ?>