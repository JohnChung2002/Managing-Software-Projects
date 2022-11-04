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
     <div id="CactusBanner" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#CactusBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#CactusBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/Cactiplant1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/Cactus4.png" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#CactusBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#CactusBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
	
<div class="container border border-success rounded my-5">
   <div class="row text-center">  
        <div class=" w-100 my-3">
          <h1 class="text-uppercase my-3">Booking Dashboard</h1>
		  <img src="images/Cactiplant1.jpg">
		<br>
        </div>
   </div>      
  <div class="row row-cols-md-2 mx-5 mt-2 mb-4">
    <?php 
    if($_SESSION["user_role"] == "Admin") {
      echo '
      <div class="col">
        <div class="card p-5 my-5 border">
          <img src="images/Cactus6.jpeg" class="card-img-top w-60" alt="...">
          <div class="card-body">
            <h5 class="card-title">UPDATE BOOKING AVAILABILITY</h5>
            <p class="card-text">Update the store\'s availability</p>
            <a href="updateavailability.php" class="btn btn-primary">Update Booking Availability</a>
        </div>
        </div>
      </div>';
    }?>
    <div class="col">
      <div class="card p-5 my-2 border">
        <img src="images/Cactus5.jpeg" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">APPOINTMENT REQUEST</h5>
          <p class="card-text">Book a new appointment</p>
          <a href="createbooking.php" class="btn btn-primary">Create Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-2 border">
        <img src="images/Cactus6.jpeg" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">MANAGE YOUR BOOKING</h5>
          <p class="card-text">Cancel, update and view booking appointment</p>
          <a href="bookinghistory.php" class="btn btn-primary">Manage Booking</a>
      </div>
      </div>
    </div>
    <?php 
    if($_SESSION["user_role"] == "Admin") {
      echo '
      <div class="col">
      <div class="card p-5 my-2 border">
        <img src="images/Cactus6.jpeg" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">SEARCH BOOKING</h5>
          <p class="card-text">Search booking by booking ID</p>
          <a href="searchbooking.php" class="btn btn-primary">Search Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-2 border">
        <img src="images/Cactus6.jpeg" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">CALENDAR BOOKING VIEW</h5>
          <p class="card-text">View all booking appointment in calendar view</p>
          <a href="viewbookings.php" class="btn btn-primary">Calendar Booking View</a>
      </div>
      </div>
    </div>';
    }
    ?>
  </div>
    </div>
  </div>
</div>

  <?php include 'footer.php'; ?>
</body>
</html>