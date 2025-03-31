<?php
session_start(); // Start session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

include_once("header.php");
?>
<br>

  <style>
    body {
      background-color: #f5f5f5;
    }
    .payment-container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-icons img {
      width: 40px;
      margin-right: 10px;
    }
  </style>

  <div class="container mt-5 payment-container">
    <h1 class="text-center mb-4" style="color: black;">Payment</h1>
    <form>
      <div class="mb-3">
        <label for="cardNumber" class="form-label">Card Number</label>
        <input type="text" class="form-control" id="cardNumber" placeholder="" maxlength="19">
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="expiryDate" class="form-label">Expiry Date</label>
          <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" maxlength="5">
        </div>
        <div class="col-md-6 mb-3">
          <label for="cvv" class="form-label">CVV</label>
          <input type="text" class="form-control" id="cvv" placeholder="XXX" maxlength="3">
        </div>
      </div>
      <div class="mb-3">
        <label for="cardHolderName" class="form-label">Cardholder Name</label>
        <input type="text" class="form-control" id="cardHolderName" placeholder="Enter name as on card">
      </div>
      <div class="mb-3">
        <label for="billingAddress" class="form-label">Billing Address</label>
        <textarea class="form-control" id="billingAddress" rows="3" placeholder="Enter billing address"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary w-100 mt-3 bg-dark">Pay Now</button>
      </div>
    </form>
  </div>

<?php include_once("footer.php"); ?>

