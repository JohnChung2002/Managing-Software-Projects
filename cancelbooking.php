<?php
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php"; ?>
    <title>Cancelling Appointment</title>
</head>
<body>
  <?php include 'header.php'; 
  if ($_SESSION["user_role"] == "Admin" || $_SESSION["user_role"] == "Super Admin") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "booking/booking_functions.php";
        adminCancelBooking();
    } 
    echo "<h1 class='text-center mt-5'>CANCEL APPOINTMENT</h1>
    <div class='container p-5 my-5 border'>
        <form method='post' class='row g-3 needs-validation' novalidate>
        <div class='col-10'>
            <label for='booking-id' class='form-label'>Booking ID</label>
            <input type='text' class='form-control' id='booking-id' name='booking-id' minlength='11' maxlength='11' required>
            <div class='valid-feedback'>Looks good!</div>
            <div class='invalid-feedback'>Please enter a valid booking id.</div>
        </div>
        <div class='col-2 d-flex flex-column'>
            <label class='form-label' style='visibility:hidden;'>Check Booking</label>
            <button type='button' class='btn btn-primary' onclick='loadActiveBookingCancel()'>Check if booking exists</button>
        </div>
        <div class='col-12'>
            <div id='check-booking'></div>
        </div>
        <div id='booking-info' class='col-12'></div>
        <div class='col-12'>
            <label for='inputReason' class='form-label'>Reason For Cancellation</label>
            <input type='text' class='form-control' id='inputReason' name='inputReason' disabled required>
            <div class='valid-feedback'>Looks good!</div>
            <div class='invalid-feedback'>Please select a reason for cancellation.</div>
        </div>
        <div class='col-12'>
            <button type='submit' class='btn btn-primary'>Cancel Now</button>
            <button type='reset' class='btn btn-primary'>Reset</button>
        </div>
        </form>
        <script src='script/booking_validation.js'></script>
        <script src='script/admin_booking.js'></script>
    </div>";
  } else {
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
            window.location.href = \'bookinghistory.php\';
            </script>';
        }
    }
  }
  include 'footer.php';
  ?>
</body>
</html>