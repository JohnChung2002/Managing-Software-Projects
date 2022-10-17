<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--javascript for bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--css for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<div class="container p-5 my-5 border">
  <h1>Visitor Booking Appointment Interface</h1>
  <p>This is Cacti Succulent Kuching’s Visitor Appointment Booking System</p>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/booking.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Book Appointment</h5>
        <p class="card-text">Create a booking appointment based on information given</p>
        <a href="vcreatebooking.php" class="btn btn-primary">Book Appointment</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/cancel.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Cancel Appointment</h5>
        <p class="card-text">Cancel your booking appointment</p>
        <a href="vcancelbooking.php" class="btn btn-primary">Cancel Appointment</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/update.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Update Appointment</h5>
        <p class="card-text">Update your appointment</p>
        <a href="vupdatebooking.php" class="btn btn-primary">Update Appointment</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/check.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Appointment History</h5>
        <p class="card-text">View your booking appointment history</p>
        <a href="vbhistory.php" class="btn btn-primary">Appointment History</a>
    </div>
    </div>
  </div>
</div>

</div>

</body>
</html>