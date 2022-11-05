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
	
<div class="container border border-success rounded my-5">
   <div class="row text-center">  
        <div class=" w-70 mx-4">
          <h1 class="text-uppercase mt-5">Booking Dashboard</h1>
		 </div>
	</div>	  
<div class="row justify-content-center">
    <div class="w-75 my-4">
		  <p>
		  Cacti-Succulent Kuching is a local homegrown business specialized in selling various 
            type and size of succulent plants. Apart from selling succulent plants, we also sell different type 
            of gardening tools, soils and fertilizers at an affordable cost. Cacti-Succulent Kuching is setup in 
            2020  in  which  business  is  running  both  at  home  as  well  as  weekend  market.  Our  primary  
            mission  is  to  establish  a  long-lasting  relationship  of  trust  and  commitment  with  each  visitor 
            through providing the highest level of customer service.
		   </p>
     </div>     
  <div class="row mx-5 mb-4">
    <?php 
    if($_SESSION["user_role"] == "Admin") {
      echo '
      <div class="col">
        <div class="card mx-5 border">
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
    if($_SESSION["user_role"] == "Admin") {
      echo '
      <div class="col">
      <div class="card mx-5 border">
        <img src="images/Cactus6.jpeg" class="card-img-top w-60" alt="...">
        <div class="card-body">
          <h5 class="card-title">SEARCH BOOKING</h5>
          <p class="card-text">Search booking by booking ID</p>
          <a href="searchbooking.php" class="btn btn-primary">Search Booking</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card mx-5 border">
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
  <?php include 'footer.php'; ?>
</body>
</html>