<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Display selected food items
$food_cart = isset($_SESSION['food_cart']) ? $_SESSION['food_cart'] : [];
$food_menu = [
    1 => ["name" => "Pizza", "price" => 10.99],
    2 => ["name" => "Burger", "price" => 7.99],
    3 => ["name" => "Pasta", "price" => 8.99],
    4 => ["name" => "Salad", "price" => 5.99]
];

$total_price = 0;
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Your Food Cart</h2>

    <?php if (empty($food_cart)) { ?>
        <p class="text-center text-danger">Your cart is empty.</p>
        <div class="text-center">
            <a href="food.php" class="btn btn-primary bg-dark">Select Food</a>
        </div>
    <?php } else { ?>
        <table class="table table-bordered">
            <tr>
                <th>Food Item</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php foreach ($food_cart as $food_id => $quantity): ?>
                <tr>
                    <td><?php echo htmlspecialchars($food_menu[$food_id]["name"]); ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>$<?php echo number_format($food_menu[$food_id]["price"] * $quantity, 2); ?></td>
                </tr>
                <?php $total_price += $food_menu[$food_id]["price"] * $quantity; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="2" class="text-end"><strong>Total:</strong></td>
                <td><strong>$<?php echo number_format($total_price, 2); ?></strong></td>
            </tr>
        </table>
        <div class="text-center">
            <a href="payment.php" class="btn btn-success bg-dark">Proceed to Payment</a>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>
