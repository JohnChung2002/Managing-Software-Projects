<?php 
include "auth/is_loggedin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php";?>
    <title>Booking Dashboard</title>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container p-5 my-5 bg-success p-3">
  <h1 class="text-center text-white">Booking Dashboard</h1>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php 
    if($_SESSION["user_role"] == "Admin") {
      echo '
      <div class="col">
        <div class="card p-5 my-5 border">
          <img src="images/update.png" class="card-img-top w-50" alt="...">
          <div class="card-body">
            <h5 class="card-title">UPDATE BOOKING AVAILABILITY</h5>
            <p class="card-text">Update the store\'s availability</p>
            <a href="updateavailability.php" class="btn btn-primary">Update Booking Availability</a>
        </div>
        </div>
      </div>';
    }?>
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/booking.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">CREATE NEW BOOKING</h5>
          <p class="card-text">Book a new appointment</p>
          <a href="createbooking.php" class="btn btn-primary">Create Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/cancel.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">CANCEL A BOOKING</h5>
          <p class="card-text">Cancel a booking appointment</p>
          <a href="cancelbooking.php" class="btn btn-primary">Cancel Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/update.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">UPDATE A BOOKING</h5>
          <p class="card-text">Update a booking appointment</p>
          <a href="updatebooking.php" class="btn btn-primary">Update Booking</a>
      </div>
      </div>
    </div>
    <?php 
    if($_SESSION["user_role"] == "Admin") {
      echo '
      <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/check.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">SEARCH BOOKING</h5>
          <p class="card-text">Search booking by booking ID</p>
          <a href="searchbooking.php" class="btn btn-primary">Search Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/check.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">CALENDAR BOOKING VIEW</h5>
          <p class="card-text">View all booking appointment in calendar view</p>
          <a href="viewbookings.php" class="btn btn-primary">Calendar Booking View</a>
      </div>
      </div>
    </div>';
    } else {
        echo '
        <div class="col">
            <div class="card p-5 my-5 border">
            <img src="images/check.png" class="card-img-top w-50" alt="...">
            <div class="card-body">
                <h5 class="card-title">BOOKING HISTORY</h5>
                <p class="card-text">View my booking appointment history</p>
                <a href="bookinghistory.php" class="btn btn-primary">Booking History</a>
            </div>
            </div>
        </div>';
    }
    ?>
  </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>