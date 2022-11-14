<?php 
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<head>
    <?php include "page_head.php"; ?>
    <!--for ajax requests-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- javascript for the calendar (date picker)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--css for the calendar (date picker)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include 'header.php'; 
  if ($_SESSION["user_role"] == "Admin") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "booking/booking_functions.php";
        adminUpdateBooking();
      } 
      echo '
      <h1 class="text-center mt-5">UPDATE APPOINTMENT</h1>
      <div class="container p-5 my-5 border">
        <form method="post" class="row g-3 needs-validation" novalidate>
          <div class="col-10">
            <label for="booking-id" class="form-label">Booking ID</label>
            <input type="text" class="form-control" id="booking-id" name="booking-id" minlength="11" maxlength="11" required>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter a valid booking id.</div>
          </div>
          <div class="col-2 d-flex flex-column">
            <label class="form-label" style="visibility:hidden;">Check Booking</label>
            <button type="button" class="btn btn-primary" onclick="loadActiveBookingUpdate()">Check if booking exists</button>
          </div>
          <div class="col-12">
            <div id="check-booking"></div>
          </div>
          <div id="booking-info" class="col-12"></div>
          <div id="update-section" style="display: none;">
            <div id="datepicker-container"></div>
            <input type="text" class="form-control" name="date" id="date" hidden required>
            <div class="mb-3">
              <label for="time" class="form-label">Available Time</label>
              <select class="form-select form-select-lg" name="time" id="time" required></select>
              <div class="valid-feedback">Looks good!</div>
              <div class="invalid-feedback">Please select a time slot.</div>
            </div>
            <div class="col-12">
              <label for="inputPpl" class="form-label">How many people will be joining?</label>
              <input type="text" pattern="^[1-9]\d*(?:\.\d+)?$" maxlength="2" class="form-control" id="inputPpl" name="inputPpl" required>
              <div class="valid-feedback">Looks good!</div>
              <div class="invalid-feedback">Please enter the number of people joining.</div>
            </div>  
            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-primary">Update Booking</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </form>
      <script src="script/datepicker.js"></script>
      <script>
        var disabledDates;
        $(document).ready(function() {
          var start_date = getToday();
          updateDisabled(start_date).then(function(data) {
              disabledDates = disablePrevNextMonthDates(data, start_date);
              loadDatePicker();
              $("#datepicker-container").datepicker("hide");
              hideNextPrevMonthDates();
          }).catch(err => console.log(err));
        });
      </script>
      <script src="script/booking_validation.js"></script>
      <script src="script/admin_booking.js"></script>
      </div>';
  } else {
    include "booking/booking_functions.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        updateUserBooking();
    } else {
        if (checkUserRedirect()) {
            echo "
            <h1 class='text-center mt-5'>UPDATE APPOINTMENT</h1>
            <div class='container p-5 my-5 border'>
                <form method='post' class='row g-3 needs-validation' novalidate>
                <div id='datepicker-container'></div>
                <input type='text' class='form-control' name='date' id='date' hidden>
                <div class='mb-3'>
                    <label for='time' class='form-label'>Available Time</label>
                    <select class='form-select form-select-lg' name='time' id='time' required></select>
                    <div class='valid-feedback'>Looks good!</div>
                    <div class='invalid-feedback'>Please select a time slot.</div>
                </div>
                <div class='col-12'>
                    <label for='inputPpl' class='form-label'>How many people will be joining?</label>
                    <input type='text' pattern='^[1-9]\d*(?:\.\d+)?$' maxlength='2' class='form-control' id='inputPpl' name='inputPpl' required>
                    <div class='valid-feedback'>Looks good!</div>
                    <div class='invalid-feedback'>Please enter the number of people joining.</div>
                </div>
                <div class='col-12'>
                    <button type='submit' class='btn btn-primary'>Update Now</button>
                    <button type='reset' class='btn btn-primary'>Reset</button>
                </div>
                </form>
                <script src='script/datepicker.js'></script>
                <script>
                var disabledDates;
                $(document).ready(function() {
                var start_date = getToday();
                updateDisabled(start_date).then(function(data) {
                    disabledDates = disablePrevNextMonthDates(data, start_date);
                    loadDatePicker();
                    $('#datepicker-container').datepicker('hide');
                    hideNextPrevMonthDates();
                }).catch(err => console.log(err));
                });
                </script>
                <script src='script/booking_validation.js'></script>
            </div>";
        } else {
            echo '<script type="text/javascript">
            window.location.href = \'bookinghistory.php\';
            </script>';
        }
    }
  }
 include 'footer.php'; ?>
</body>
</html>