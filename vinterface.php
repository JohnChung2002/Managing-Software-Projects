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
<?php include 'header.php'; ?>

<div class="container p-5 my-5 bg-success p-3">
  <h1 class="text-center text-white">SERVICES</h1>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/booking.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">BOOK MY APPOINTMENT</h5>
        <p class="card-text">To apply for a new appointment, please make sure you have a valid contact information otherwise your appointment will be void.</p>
        <a href="vcreatebooking.php" class="btn btn-primary">Book Appointment</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/cancel.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">CANCEL MY APPOINTMENT</h5>
        <p class="card-text">Cancel my booking appointment</p>
        <a href="vcancelbooking.php" class="btn btn-primary">Cancel Appointment</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/update.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">UPDATE MY APPOINTMENT</h5>
        <p class="card-text">Update your appointment</p>
        <a href="vupdatebooking.php" class="btn btn-primary">Update Appointment</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card p-5 my-5 border">
      <img src="images/check.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">MY APPOINTMENT HISTORY</h5>
        <p class="card-text">View my booking appointment history</p>
        <a href="vbhistory.php" class="btn btn-primary">Appointment History</a>
    </div>
    </div>
  </div>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>