<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include_once("header.php"); ?>

<style>
.carousel-indicators {
    bottom: 10px !important;
}
.carousel-indicators button {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: white;
}
</style>
<br>
<div class="container">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
        </div>
        
        <!-- Slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/banner.jpg" alt="Banquet Hall" class="d-block w-100" style="height:500px;">
                <div class="carousel-caption">
                    <h3>Banquet Hall</h3>
                    <p>A wonderful place for celebrations</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/unnamed.jpg" alt="Engagement" class="d-block w-100" style="height:500px;">
                <div class="carousel-caption">
                    <h3>Engagement</h3>
                    <p>Celebrate your love</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/birthday.jpg" alt="Birthday" class="d-block w-100" style="height:500px;">
                <div class="carousel-caption">
                    <h3>Birthday</h3>
                    <p>Enjoy with friends and family</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/concerts.jpg" alt="Concerts" class="d-block w-100" style="height:500px;">
                <div class="carousel-caption">
                    <h3>Concerts</h3>
                    <p>Experience unforgettable performances</p>
                </div>
            </div>
        </div>
        
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<div class="container mt-5">
    <h1 class="text-center">What We Organize</h1>
    <hr>
</div>

<!-- Event Sections -->
<div class="container">
    <?php 
    $events = [
        ["Wedding", "images/wedding2.jpg", "The most important day in a couple's life.", "events.php"],
        ["Birthday", "images/birthday2.jpg", "Celebrate with your loved ones in style.", "events.php"],
        ["Fashion", "images/fashion2.jpg", "Showcase your latest fashion trends.", "events.php"],
        ["Meeting", "images/meeting2.jpg", "Host professional business meetings.", "events.php"]
    ];
    
    foreach ($events as $event) {
        echo "<div class='row my-5 align-items-center'>
                <div class='col-md-6'>
                    <img src='{$event[1]}' class='img-fluid rounded'>
                </div>
                <div class='col-md-6'>
                    <h2>{$event[0]}</h2>
                    <p>{$event[2]}</p>
                    <a href='{$event[3]}' class='btn btn-primary bg-dark'>View Events</a>
                </div>
              </div>
              <hr>";
    }
    ?>
</div>

<?php include_once("footer.php"); ?>
