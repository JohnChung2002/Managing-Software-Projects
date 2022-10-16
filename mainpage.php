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
  
  <div class =" d-flex justify-content-center" >
    <p><strong><h1 class="display-4">ADMINS MODULE</h1></strong></p>
  </div>  


  <div class="p-3 d-flex justify-content-evenly">
  <div class="card " style="width: 30rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body" >
      <h5 class="card-title">Create Booking Appointment</h5>
      <p class="card-text">Create a booking appointment for the customers based on their information given.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

  <div class="card" style="width: 30rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Update booking appointment availibilty</h5>
      <p class="card-text">Update the hours available for the users to make their bookings</p>
      <a href="updateavailability.html" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  </div>

  <div class="p-3 d-flex justify-content-evenly">
    <div class="card " style="width: 30rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body" >
        <h5 class="card-title">Update users Booking Appointment</h5>
        <p class="card-text">Update the specific datas from the database for the users based on the information given by the users and appendthe new changes.</p>
        <a href="Updateappointment.php" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  
    <div class="card" style="width: 30rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Checking Booking Appointment</h5>
        <p class="card-text">Retrieving and displaying the users booking appointment made by the users in a list format.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>

    <div class="p-3 d-flex justify-content-center">
    <div class="card" style="width: 30rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Cancelling Booking Appointment</h5>
        <p class="card-text">Cancel the user's booking appointment made and delete it from the database.</p>
        <a href="cancel_appointment.php" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>


  <?php include 'footer.php'; ?>
</body>
</html>

