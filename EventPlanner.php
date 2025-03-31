<?php
include_once("header.php");

// Start session to check login status
// session_start();
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

// Array of event planners with names and images
$planners = [
    ["name" => "John Smith", "image" => "images/planner1.jpg"],
    ["name" => "Emily Johnson", "image" => "images/planner2.jpg"],
    ["name" => "Michael Brown", "image" => "images/planner3.jpg"],
    ["name" => "Sarah Davis", "image" => "images/planner4.jpg"],
    ["name" => "David Wilson", "image" => "images/planner5.jpg"],
    ["name" => "Jessica Martinez", "image" => "images/planner6.jpg"],
    ["name" => "Daniel Anderson", "image" => "images/planner7.jpg"],
    ["name" => "Sophia Thomas", "image" => "images/planner8.jpg"]
];

?>

<style>
  /* Card Styling */
  .card {
    height: auto;
    background: #131722;
    color: white;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    text-align: center;
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

  /* Button Styling */
  .btn-dark, .btn-contact {
    width: 100%;
    display: block;
    background-color: #ffcc00;
    color: black;
    font-weight: bold;
    border-radius: 5px;
    padding: 10px;
    margin-top: 10px;
    text-align: center;
    cursor: pointer;
    border: none;
    transition: background 0.3s ease;
  }

  .btn-dark:hover, .btn-contact:hover {
    background-color: #e6b800;
  }
</style>
<br>
<!-- Font Awesome for Search Icon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Search Bar -->
<div class="search-container">
    <input type="text" id="searchInput" class="search-input" placeholder="Search planners..." onkeyup="filterPlanners()">
    <button class="search-btn">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</div>

<div class="container text-center mt-5">
    <h1 class="fw-medium fs-3">Meet Our Event Planners</h1>
    <br>
    <div class="row" id="plannerList">
    <?php foreach ($planners as $planner) { ?>
    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2 planner-card">
        <div class="card">
            <!-- <img class="card-img-top" src="<?php echo $planner['image']; ?>" alt="<?php echo $planner['name']; ?>"> -->
            <div class="card-body">
                <h4 class="card-title"><?php echo $planner['name']; ?></h4>
                <p class="card-text">Professional event planner with years of experience.</p>

                <!-- Modify the View More Button -->
                <a href="EventPlannerDetail.php?id=<?php echo array_search($planner, $planners) + 1; ?>">
                <img class="card-img-top" src="<?php echo $planner['image']; ?>" alt="<?php echo $planner['name']; ?>">
                    <button type="button" class="btn btn-dark">View More Details</button>
                </a>

                <!-- Show Contact Button Only If Logged In -->
                <?php if ($isLoggedIn) { ?>
                    <a href="contact_form.php">
                        <button type="button" class="btn-contact">Contact</button>
                    </a>
                <?php } else { ?>
                    <!-- Redirect to login if not logged in -->
                    <button type="button" class="btn-contact" onclick="redirectToLogin()">Contact</button>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

    </div>
</div>

<script>
// Search Function
function filterPlanners() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let cards = document.getElementsByClassName("planner-card");

    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector(".card-title").innerText.toLowerCase();
        cards[i].style.display = title.includes(input) ? "block" : "none";
    }
}

// Redirect Function
function redirectToLogin() {
    alert("Please log in to contact a planner.");
    window.location.href = "login.php";  // Redirect to login page
}
</script>

<?php include_once("footer.php"); ?>
