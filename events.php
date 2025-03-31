<!-- gallery.php -->

<?php
include_once("header.php");
?>

<style>
  .card {
    background:rgb(243, 244, 249);
    color: black;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    text-align: center;
  }

  .card img {
    height: 250px;
    object-fit: cover;
    width: 100%;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .card h4 {
    font-size: 18px;
    font-weight: bold;
    padding: 10px;
  }
</style>

<?php
// Array of event data
$events = [
    ["title" => "Birthday", "image" => "images/venue1.jpeg"],
    ["title" => "Wedding Ceremony", "image" => "images/venue2.jpeg"],
    ["title" => "Haldi Ceremony", "image" => "images/venue3.jpeg"],
    ["title" => "Cocktail Party", "image" => "images/venue4.jpeg"],
    ["title" => "Farewell Party", "image" => "images/venue5.jpg"],
    ["title" => "Meeting Hall", "image" => "images/venue6.jpg"],
    ["title" => "Fashion Show", "image" => "images/venue7.jpg"],
    ["title" => "Banquet Hall", "image" => "images/venue8.jpg"]
];
?>

<div class="container text-center mt-5">
    <h1 class="fw-medium fs-3"> Our Planned Event </h1>
    <br>
    <div class="row">
        
        <?php foreach ($events as $event) { ?>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 p-2">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $event['image']; ?>" alt="Event Image">
                    <h4 class="card-title"><?php echo $event['title']; ?></h4>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php include_once("footer.php"); ?>
