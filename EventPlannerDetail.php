<?php
include_once("header.php");

// Array with detailed information about each planner
$plannerDetails = [
    1 => [
        "name" => "John Smith",
        "experience" => "John has 10+ years of experience in event planning. He specializes in corporate events, weddings, and private parties.",
        "profile_photo" => "images/planner1.jpg",
        "photo_gallery" => ["images/event3.jpg", "images/event2.jpg", "images/WB1.jpg" ,"images/mandap1.jpg"],
        "video" => "videos/video15.mp4",
        "reviews" => [
            ["user" => "Alice Johnson", "photo" => "images/planner10.jpg", "review" => "John planned our corporate event perfectly. Highly recommended!"],
            ["user" => "David Brown", "photo" => "images/planner9.jpg", "review" => "Amazing wedding planner! Everything was flawless."]
        ]
    ],
    2  => [
        "name" => "David Lee",
        "experience" => "David specializes in luxury weddings and destination events with a keen eye for detail.",
        "profile_photo" => "images/planner2.jpg",
        "photo_gallery" =>  ["images/event2.jpg", "images/WB2.jpg", "images/venue1.jpeg" ,"images/event6.jpg "],
        "video" => "videos/video1.mp4",
        "reviews" => [
            ["user" => "Sophia Miller", "photo" => "images/planner8.jpg", "review" => "David made our wedding a dream come true!"],
            ["user" => "Chris Brown", "photo" => "images/planner7.jpg", "review" => "Highly professional and organized."]
        ]
    ],
    3 => [
        "name" => "Michael Brown",
        "experience" => "Michael is an expert in music festivals and large-scale corporate events with over 12 years of experience.",
        "profile_photo" => "images/planner3.jpg",
        "photo_gallery" =>  ["images/event2.jpg", "images/event3.jpg", "images/event2.jpg" ,"images/event3.jpg"],
        "video" => "videos/video14.mp4",
        "reviews" => [
            ["user" => "Chris Evans", "photo" => "images/com.jpg", "review" => "Handled our concert with perfection. Would hire again!"],
            ["user" => "Emma Watson", "photo" => "images/com1.jpg", "review" => "Very organized and professional."]
        ]
    ],
    4 => [
        "name" => "Sarah Davis",
        "experience" => "Sarah is an expert in music festivals and large-scale corporate events with over 12 years of experience.",
        "profile_photo" => "images/planner4.jpg",
        "photo_gallery" =>  ["images/event2.jpg", "images/event3.jpg", "images/event2.jpg" ,"images/event3.jpg"],
        "video" => "videos/video11.mp4",
        "reviews" => [
            ["user" => "Chris Evans", "photo" => "images/com2.jpg", "review" => "Handled our concert with perfection. Would hire again!"],
            ["user" => "Emma Watson", "photo" => "images/com3.jpg", "review" => "Very organized and professional."]
        ]
    ],
    5 => [
        "name" => "David Wilson",
        "experience" => "David  is an expert in music festivals and large-scale corporate events with over 12 years of experience.",
        "profile_photo" => "images/planner5.jpg",
        "photo_gallery" => ["images/event2.jpg", "images/event3.jpg", "images/event2.jpg" ,"images/event3.jpg"],
        "video" => "videos/video9.mp4",
        "reviews" => [
            ["user" => "Chris Evans", "photo" => "images/com4.jpg", "review" => "Handled our concert with perfection. Would hire again!"],
            ["user" => "Emma Watson", "photo" => "images/com5.jpg", "review" => "Very organized and professional."]
        ]
    ],
    6 => [
        "name" => "Jessica Martinez",
        "experience" => "Jessica  is an expert in music festivals and large-scale corporate events with over 12 years of experience.",
        "profile_photo" => "images/planner6.jpg",
        "photo_gallery" => ["images/event2.jpg", "images/event3.jpg", "images/event2.jpg" ,"images/event3.jpg"],
        "video" => "videos/video10.mp4",
        "reviews" => [
            ["user" => "Chris Evans", "photo" => "images/com6.jpg", "review" => "Handled our concert with perfection. Would hire again!"],
            ["user" => "Emma Watson", "photo" => "images/com7.jpg", "review" => "Very organized and professional."]
        ]
    ],
    7 => [
        "name" => "Daniel Anderson",
        "experience" => "Mr.Anderson is an expert in music festivals and large-scale corporate events with over 12 years of experience.",
        "profile_photo" => "images/planner7.jpg",
        "photo_gallery" =>  ["images/event2.jpg", "images/event3.jpg", "images/event2.jpg" ,"images/event3.jpg"],
        "video" => "videos/video13.mp4",
        "reviews" => [
            ["user" => "Chris Evans", "photo" => "images/com8.jpg", "review" => "Handled our concert with perfection. Would hire again!"],
            ["user" => "Emma Watson", "photo" => "images/com9.jpg", "review" => "Very organized and professional."]
        ]
    ],
    8 => [
        "name" => "Sophia Thomas",
        "experience" => "Sophia  is an expert in music festivals and large-scale corporate events with over 12 years of experience.",
        "profile_photo" => "images/planner8.jpg",
        "photo_gallery" =>  ["images/event2.jpg", "images/event3.jpg", "images/event2.jpg" ,"images/event3.jpg"],
        "video" => "videos/video12.mp4",
        "reviews" => [
            ["user" => "Chris Evans", "photo" => "images/com10.jpg", "review" => "Handled our concert with perfection. Would hire again!"],
            ["user" => "Emma Watson", "photo" => "images/com11.jpg", "review" => "Very organized and professional."]
        ]
    ]
];

   

// Get planner ID from URL, default to 1 if not found
$plannerId = isset($_GET['id']) && array_key_exists((int)$_GET['id'], $plannerDetails) ? (int)$_GET['id'] : 0;

// Fetch details for the selected planner
$planner = $plannerDetails[$plannerId];
?>

<style>
  .profile-container {
    text-align: center;
    margin-bottom: 20px;
  }

  .profile-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #ffcc00;
  }

  .gallery img {
    width: 100%;
    height: auto;
    border-radius: 5px;
  }

  .video-container {
    text-align: center;
    margin-top: 20px;
  }

  /* Carousel Styling */
  .carousel-item img {
    height: 400px;
    object-fit: cover;
    border-radius: 10px;
  }

  /* Review Section */
  .review-container {
    margin-top: 30px;
  }

  .review-box {
    display: flex;
    align-items: center;
    background: #1c2130;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
  }

  .review-box img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
  }

  .review-text {
    color: white;
  }

  .btn-back {
    display: block;
    width: 100%;
    background: #ffcc00;
    color: black;
    font-weight: bold;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
    text-decoration: none;
  }

  .btn-back:hover {
    background: #e6b800;
  }
</style>

<div class="container mt-5">
    <!-- Planner Profile -->
    <div class="profile-container">
        <img src="<?php echo htmlspecialchars($planner['profile_photo']); ?>" alt="Planner Photo" class="profile-photo">
        <h1 class="fw-medium fs-3 mt-3"><?php echo htmlspecialchars($planner['name']); ?></h1>
        <p class="text-muted"><?php echo htmlspecialchars($planner['experience']); ?></p>
    </div>

    <!-- Event Gallery Carousel -->
   <!-- Event Gallery Carousel -->
   <h3 class="mt-4">Past Events</h3>
<div id="eventGallery" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($planner['photo_gallery'] as $index => $photo) { 
            $imagePath = file_exists($photo) ? $photo : 'images/placeholder.jpg'; ?>
            <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                <img src="<?php echo htmlspecialchars($imagePath); ?>" class="d-block w-100" alt="Event Photo">
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#eventGallery" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#eventGallery" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

    <!-- Event Video -->
    <h3 class="mt-4">Event Video</h3>
    <div class="video-container">
        <video width="100%" height="400" controls>
            <source src="<?php echo htmlspecialchars($planner['video']); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Reviews Section -->
    <h3 class="mt-4">Client Reviews</h3>
    <div class="review-container">
        <?php foreach ($planner['reviews'] as $review) { ?>
            <div class="review-box">
                <img src="<?php echo htmlspecialchars($review['photo']); ?>" alt="User Photo">
                <div class="review-text">
                    <strong><?php echo htmlspecialchars($review['user']); ?></strong>
                    <p><?php echo htmlspecialchars($review['review']); ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="EventPlanner.php" class="btn-back">Back to Planners</a>
    </div>
    <div class="mt-4">
        <a href="review.php" class="btn-back">Write review</a>
    </div>
</div>

<!-- Bootstrap JS for Carousel -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once("footer.php"); ?>
