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
  <div class="container border border-success rounded my-5 pb-5">
  <h1 class="text-center text-uppercase my-5">Booking Dashboard</h1>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php 
    if($_SESSION["user_role"] == "Admin" || $_SESSION["user_role"] == "Super Admin") {
      echo '
      <div class="col">
        <div class="card mx-5 border">
          <img src="images/Cactus1.png" class="card-img-top w-60" alt="...">
          <div class="card-body">
            <h5 class="card-title">UPDATE BOOKING AVAILABILITY</h5>
            <p class="card-text">Update the store\'s availability</p>
            <a href="updateavailability.php" class="btn btn-primary">Update Booking Availability</a>
        </div>
        </div>
      </div>';
    }?>
    <div class="col">
      <div class="card mx-5 border">
        <img src="images/Cactus5.jpeg" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">APPOINTMENT REQUEST</h5>
          <p class="card-text">
		  Simply choose a date and time that works for you. 
		  You will receive a notification with your appointment details once you have scheduled one.
		  </p>
          <a href="createbooking.php" class="btn btn-primary">Create Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-5 border">
        <img src="images/Cactus6.jpeg" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">MANAGE YOUR BOOKING</h5>
          <p class="card-text">
		  We understand that your plans can occasionally change. 
		  With this feature, you can easily and instantly make changes to your appointment online.
		  </p>
          <a href="bookinghistory.php" class="btn btn-primary">Manage Booking</a>
      </div>
      </div>
    </div>
    <?php 
    if($_SESSION["user_role"] == "Admin" || $_SESSION["user_role"] == "Super Admin") {
      echo '
      <div class="col">
      <div class="card mx-5 border">
        <img src="images/Cactus1.png" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">SEARCH BOOKING</h5>
          <p class="card-text">Search booking by booking ID</p>
          <a href="searchbooking.php" class="btn btn-primary">Search Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-5 border">
        <img src="images/Cactus1.png" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">CALENDAR BOOKING VIEW</h5>
          <p class="card-text">View all booking appointment in calendar view</p>
          <a href="viewbookings.php" class="btn btn-primary">Calendar Booking View</a>
      </div>
      </div>
    </div>
    
    <div class="col">
    <div class="card mx-5 border">
      <img src="images/reqenquiry.png" class="card-img-top w-50" alt="...">
      <div class="card-body">
        <h5 class="card-title">REPLY ENQUIRY</h5>
        <p class="card-text">View and response enquiries made</p>
        <a href="enquiryadmin.php" class="btn btn-primary">Reply Enquiry</a>
    </div>
    </div>
  </div>'
    
    ;
    } else {
        echo '<div class="col">
        <div class="card mx-5 border">
          <img src="images/reqenquiry.png" class="card-img-top w-50" alt="...">
          <div class="card-body">
            <h5 class="card-title">REQUEST ENQUIRY</h5>
            <p class="card-text">Request an enquiry regarding any questions!</p>
            <a href="enquiry.php" class="btn btn-primary">Request Enquiry</a>
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