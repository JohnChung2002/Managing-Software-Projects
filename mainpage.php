<!DOCTYPE html>
<html lang="en">
<!-- Description :  Home Page -->
<!-- Author   : Chow Zi Xiang -->

<head>
    <?php include "page_head.php"; ?>
    <title>Cancelling Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'/>
    <!-- from bootstrap -->
    <script src="js/script.js"></script>
    <link rel=”stylesheet” href=”https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css”rel=”nofollow” integrity=”sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I” crossorigin=”anonymous”>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include 'header.php'; ?>
  
  <div class="container p-5 my-5 bg-success p-3">
  <h1 class="text-center text-white">SERVICES</h1>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/update.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">UPDATE BOOKING AVAILABILITY</h5>
          <p class="card-text">Update the store's availability</p>
          <a href="updateavailability.php" class="btn btn-primary">Update Booking Availability</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/booking.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">BOOK AN APPOINTMENT</h5>
          <p class="card-text">Apply for a new appointment</p>
          <a href="createbooking.php" class="btn btn-primary">Book Appointment</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/cancel.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">CANCEL AN APPOINTMENT</h5>
          <p class="card-text">Cancel a booking appointment</p>
          <a href="cancelbooking.php" class="btn btn-primary">Cancel Appointment</a>
      </div>
      </div>
    </div>
    <div class="col">
      <div class="card p-5 my-5 border">
        <img src="images/update.png" class="card-img-top w-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">UPDATE AN APPOINTMENT</h5>
          <p class="card-text">Update a booking appointment</p>
          <a href="updatebooking.php" class="btn btn-primary">Update Appointment</a>
      </div>
      </div>
    </div>
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
          <h5 class="card-title">CALENDAR APPOINTMENT VIEW</h5>
          <p class="card-text">View all booking appointment in calendar view</p>
          <a href="viewbookings.php" class="btn btn-primary">Calendar Appointment View</a>
      </div>
      </div>
    </div>
  </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>

