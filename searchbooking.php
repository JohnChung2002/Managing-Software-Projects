<?php
  include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<head>
  <?php include "page_head.php"; ?>
  <title>Search Appointment</title>
  <!--for ajax requests-->
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="min-vh-100">
    <h1 class='text-center mt-5'>SEARCH APPOINTMENT</h1>
    <div class='container p-5 my-5 border'>
      <div class='row g-3'>
        <div class='col-10'>
          <label for='booking-id' class='form-label'>Booking ID</label>
          <input type='text' class='form-control' id='booking-id' name='booking-id' minlength='11' maxlength='11' required>
          <div class='valid-feedback'>Looks good!</div>
          <div class='invalid-feedback'>Please enter a valid booking id.</div>
        </div>
        <div class='col-2 d-flex flex-column'>
          <label class='form-label' style='visibility:hidden;'>Check Booking</label>
          <button type='button' class='btn btn-primary' onclick='loadBooking()'>Check if booking exists</button>
        </div>
        <div class='col-12'>
          <div id='check-booking'></div>
        </div>
        <div id='booking-info' class='col-12'></div>  
      </div>
      <script src='script/booking_validation.js'></script>
      <script src='script/admin_booking.js'></script>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>