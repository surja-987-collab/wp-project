<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'header.php'; ?>



    <style>
        /* General Styling */
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            background-color: #fff;
            position: fixed;
            padding: 20px;
            border-right: 2px solid #ddd;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            display: block;
            color: #555;
            padding: 12px;
            margin: 5px 0;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #007bff;
            color: #fff;
        }
        .sidebar h4 {
            color: #007bff;
        }

        /* Content */
        .content {
            margin-left: 280px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        /* Table */
        .table {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .table tbody tr:hover {
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        /* Pagination */
        .pagination {
            margin-top: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                width: 100%;
                height: auto;
                padding: 10px;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>


<div class="sidebar">
    <h4><i class="fas fa-user"></i> Dashboard</h4>
    <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>"><i class="fas fa-th-large"></i> Home</a>
    <a href="MyBooking.php" class="<?= basename($_SERVER['PHP_SELF']) == 'MyBooking.php' ? 'active' : '' ?>"><i class="fas fa-calendar-check"></i> My Bookings</a>
    <a href="profile.php" class="<?= basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : '' ?>"><i class="fas fa-user"></i> Profile</a>
    <a href="ContactUs.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ContactUs.php' ? 'active' : '' ?>"><i class="fas fa-envelope"></i> Contact</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
<div class="content">
    <h3><i class="fas fa-calendar-alt"></i> My Bookings</h3>
    <p>All your booking history</p>

    <div class="card p-3">
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th>S.No</th>
                    <th>ID</th>
                    <th>Contact Info</th>
                    <th>Booking No.</th>
                    <th>Booking Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>#12345</td>
                    <td>John Doe</td>
                    <td>BK2024001</td>
                    <td>12 Feb 2024</td>
                    <td>$250</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td><span class="badge bg-primary">Paid</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>#12346</td>
                    <td>Jane Smith</td>
                    <td>BK2024002</td>
                    <td>15 Feb 2024</td>
                    <td>$180</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td><span class="badge bg-secondary">Unpaid</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>#12347</td>
                    <td>Michael Lee</td>
                    <td>BK2024003</td>
                    <td>18 Feb 2024</td>
                    <td>$320</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                    <td><span class="badge bg-secondary">Refunded</span></td>
                </tr>
            </tbody>
        </table>

        <nav class="pagination">
            <ul class="pagination justify-content-end">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>



