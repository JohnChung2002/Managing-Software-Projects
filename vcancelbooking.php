<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "page_head.php";?>
    <!--javascript for bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--css for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php include 'header.php';
  include "booking/booking_functions.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    cancelUserBooking();
  } else {
    if (checkUserRedirect()) {
      echo "
      <h1 class='text-center mt-5'>CANCEL APPOINTMENT</h1>
      <div class='container p-5 my-5 border'>
        <p>You are now cancelling the following appointment. Please confirm your cancellation.</p>";
      getBookingInformation($_GET["id"]);
      echo "
        <form method='post' class='row g-3 needs-validation' novalidate>
          <div class='col-md-6'>
          <label for='inputReason' class='form-label'>Reason For Cancellation</label>
          <input type='text' class='form-control' id='inputReason' name='inputReason' required>
          <div class='valid-feedback'>Looks good!</div>
          <div class='invalid-feedback'>Please select a reason for cancellation.  </div>
          </div>
          <div class='col-12'>
            <button type='submit' class='btn btn-primary'>Cancel Now</button>
            <button type='reset' class='btn btn-primary'>Reset</button>
          </div>
        </form>
        <script src='script/booking_validation.js'></script>
      </div>";
    } else {
      echo '<script type="text/javascript">
      window.location.href = \'vbhistory.php\';
      </script>';
    }
  }
  ?>
<?php include 'footer.php'; ?>
</body>
</html>
