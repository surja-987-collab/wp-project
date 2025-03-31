<?php
// Include database connection
include_once('header.php');
include 'db_connection.php';

// Fetch latest bookings from the database
$sql = "SELECT * FROM book_event ORDER BY booking_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>📅 My Bookings</h2>
    <p>All your booking history</p>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>S.No</th>
                <th>ID</th>
                <th>Contact Info</th>
                <th>Mobile</th>
                <th>Booking No.</th>
                <th>Booking Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Payment</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $sn = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$sn}</td>
                        <td>{$row['booking_id']}</td>
                        <td>{$row['name']}</td> 
                        <td>{$row['mobile']}</td> <!-- ✅ Mobile column added -->
                        <td>{$row['booking_no']}</td>
                        <td>" . date("d M Y", strtotime($row["booking_date"])) . "</td>
                        <td>\${$row['amount']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['payment_status']}</td>
                    </tr>";
                    $sn++;
                }
            } else {
                echo "<tr><td colspan='9'>No bookings found</td></tr>"; // ✅ Updated colspan to 9
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
