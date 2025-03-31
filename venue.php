<!-- gallery.php -->

<?php
include_once("header.php");
?>

<style>
  .card {
    height: 400px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  
  .card img {
    height: 250px;
    object-fit: cover;
    width: 100%;
  }
  
  .card-container {
    display: flex;
    align-items: stretch;
  }

  /* Reduce gap between search and events */
  .container.mt-2.mb-3 {
    margin-bottom: 0.5rem !important;
  }

  /* Add gap between planner section and footer */
  .container.text-center.mt-5 {
    margin-bottom: 4rem !important;
  }

  /* Reduce top margin of Events heading */
  .container.text-center.mt-5 p.ms-5 {
    margin-top: 0rem !important;
  }

  .card {
    height: auto;
    background: #131722;
    color: white;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    padding-bottom: 15px;
  }

  .card img {
    height: 250px;
    object-fit: cover;
    width: 100%;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .card-body {
    padding: 15px;
  }

  .card h4 {
    font-size: 18px;
    font-weight: bold;
  }

  .card p {
    font-size: 14px;
    color: #b0b0b0;
  }

  .details-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
  }

  .details-container div {
    text-align: center;
  }

  .details-container div span {
    font-weight: bold;
    color: white;
  }

  .book-now-btn {
    width: 100%;
    background: #ffcc00;
    color: black;
    font-weight: bold;
    border-radius: 5px;
    padding: 10px;
    margin-top: 10px;
    text-align: center;
    cursor: pointer;
  }

  .heart-icon {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 22px;
    color: white;
    cursor: pointer;
    transition: color 0.3s ease-in-out;
  }

  /* When clicked, turn red */
  .heart-icon.liked {
    color: red;
  }

  /* Search Bar */
  .search-container {
    text-align: center;
    margin-bottom: 20px;
  }

  .search-input {
    width: 50%;
    padding: 10px;
    border-radius: 25px;
    border: none;
    outline: none;
    font-size: 16px;
    background: #1c2130;
    color: white;
  }

  .search-input::placeholder {
    color: #888;
  }

  .search-btn {
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 18px;
    color: white;
    margin-left: -35px;
  }

</style>

<?php
include_once("header.php");

// Array of event data
$events = [
    ["title" => "Birthday", "image" => "images/venue1.jpeg", "description" => "Birthday Celebration", "halls" => 1, "sqft" => 7000, "capacity" => 200],
    ["title" => "Wedding Ceremony", "image" => "images/venue2.jpeg", "description" => "Wedding Celebration", "halls" => 2, "sqft" => 10000, "capacity" => 500],
    ["title" => "Haldi Ceremony", "image" => "images/venue3.jpeg", "description" => "Traditional Haldi Event", "halls" => 1, "sqft" => 5000, "capacity" => 150],
    ["title" => "Cocktail Party", "image" => "images/venue4.jpeg", "description" => "Night Party Event", "halls" => 1, "sqft" => 6000, "capacity" => 250],
    ["title" => "Farewell Party", "image" => "images/venue5.jpg", "description" => "College Farewell Event", "halls" => 1, "sqft" => 5500, "capacity" => 180],
    ["title" => "Meeting Hall", "image" => "images/venue6.jpg", "description" => "Corporate Meeting", "halls" => 1, "sqft" => 8000, "capacity" => 300],
    ["title" => "Fashion Show", "image" => "images/venue7.jpg", "description" => "Runway Show", "halls" => 1, "sqft" => 9000, "capacity" => 400],
    ["title" => "Banquet Hall", "image" => "images/venue8.jpg", "description" => "Large Hall for Events", "halls" => 2, "sqft" => 12000, "capacity" => 600]
];

?>
<br>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Search Bar -->
<div class="search-container">
    <input type="text" id="searchInput" class="search-input" placeholder="Search venues..." onkeyup="filterevent()">
    <button class="search-btn">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</div>

<div class="container text-center mt-5">
    <h1 class="fw-medium fs-3">Our Venues </h1>
    <br>
    <div class="row">
        <?php foreach ($events as $event) { ?>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2 event-card">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $event['image']; ?>" alt="Event Image">

                    <!-- Heart Icon -->
                    <div class="heart-icon" onclick="toggleHeart(this)"><i class="fa-regular fa-heart"></i></div>

                    <div class="card-body">
                        <h4 class="card-title"><?php echo $event['title']; ?></h4>
                        <p class="card-text"><?php echo $event['description']; ?></p>

                        <!-- Venue Details -->
                        <div class="details-container">
                            <div>
                                <span><?php echo $event['halls']; ?></span> <br> Halls
                            </div>
                            <div>
                                <span><?php echo $event['sqft']; ?></span> <br> Sq Ft
                            </div>
                            <div>
                                <span><?php echo $event['capacity']; ?></span> <br> Capacity
                            </div>
                        </div>

                        <!-- Book Now Button -->
                        <a href="book_event.php">
                            <div class="book-now-btn">🛒 Book Now</div>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
function toggleHeart(element) {
    element.classList.toggle("liked"); // Toggle "liked" class (Red Color)
}

function filterevent() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let cards = document.getElementsByClassName("event-card");

    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector(".card-title").innerText.toLowerCase();
        if (title.includes(input)) {
            cards[i].style.display = "block";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>

<?php include_once("footer.php"); ?>
