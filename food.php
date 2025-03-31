<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Sample food menu with images
$food_menu = [
    ["id" => 1, "name" => "Pizza", "price" => 10.99, "image" => "images/pizza3.jpg"],
    ["id" => 2, "name" => "Burger", "price" => 7.99, "image" => "images/burger2.jpg"],
    ["id" => 3, "name" => "Pasta", "price" => 8.99, "image" => "images/paneer tikka.jpg"],
    ["id" => 4, "name" => "Salad", "price" => 5.99, "image" => "images/salad.jpg"]
];

// Handle food selection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['food'])) {
        foreach ($_POST['food'] as $food_id => $quantity) {
            if ($quantity > 0) {
                $_SESSION['food_cart'][$food_id] = $quantity;
            }
        }
        header("Location: cart.php");
        exit();
    } else {
        $error = "Please select at least one food item.";
    }
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Select Food for Your Event</h2>

    <?php if (isset($error)) echo "<p class='text-danger text-center'>$error</p>"; ?>

    <form method="POST">
        <table class="table table-bordered text-center">
            <tr>
                <th>Image</th>
                <th>Food Item</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php foreach ($food_menu as $food): ?>
                <tr>
                    <td>
                        <img src="<?php echo $food["image"]; ?>" alt="<?php echo $food["name"]; ?>" width="80">
                    </td>
                    <td><?php echo htmlspecialchars($food["name"]); ?></td>
                    <td>$<?php echo number_format($food["price"], 2); ?></td>
                    <td>
                        <input type="number" name="food[<?php echo $food["id"]; ?>]" min="0" value="0" class="form-control">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <button type="submit" class="btn btn-success w-100 bg-dark">Add to Cart</button>
    </form>

    <div class="text-center mt-4">
        <a href="cart.php" class="btn btn-warning">Go to Cart</a>
    </div>
</div>

<?php include 'footer.php'; ?>
