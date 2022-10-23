<?php
  include 'auth/is_user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking History</title>
    <?php include "page_head.php";?>
</head>
<body>
  <?php include 'header.php'; ?>
  <h1 class="text-center mt-5">BOOKING HISTORY</h1>
  <div class="container p-5 my-5 border">
    <div class='row'>
      <?php  
        include 'booking/booking_functions.php';
        getUserBooking();
      ?>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
