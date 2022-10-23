<!DOCTYPE html>
<html lang="en">
<!-- Description :  Home Page -->
<!-- Author   : Chow Zi Xiang -->

<head>
    <title>Updating Booking Availability</title>
    <?php include "page_head.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--for ajax requests-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  </head>
<body>
  <?php include 'header.php'; 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "booking/booking_functions.php";
    updateAvailability();
  } 
  ?>
  <h1 class="text-center mt-5">UPDATE BOOKING AVAILABILITY</h1>
  <div class="container p-5 my-5 border">
    <form method="post" class="row g-3 needs-validation" novalidate>
      <div class="col-12">
        <label for="date" class="form-label">Select date</label>
        <input type="date" class="form-control" id="date" name="date" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please select the date to set custom availability.</div>
      </div>
      <div class="col-12">
        <label for="date" class="form-label">Select option</label>
        <br/>
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" id="closed" name="custom-option" value="closed" onclick="availabilityClosed()" required>
          <label for="closed" class="form-check-label">Closed</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" id="open-with-no-breaks" name="custom-option" value="open-with-no-breaks" onclick="availabilityOpenNoBreak()" required>
          <label for="open-with-no-breaks" class="form-check-label">Open (No Breaks)</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" id="open-with-one-break" name="custom-option" value="open-with-one-break" onclick="availabilityOpenBreak()" required>
          <label for="open-with-one-break" class="form-check-label">Open (1 break)</label>
        </div>
      </div>
      <div id="oc-1" class="row mt-3" style="display: none;"></div>
      <div id="oc-2" class="row mt-3" style="display: none;"></div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Update Availability</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>
    </form>
  </div>
  <script>
    document.getElementById("date").min = new Date().toISOString().split('T')[0];
  </script>
  <script src="script/availability_validation.js"></script>
  <script src="script/admin_booking.js"></script>
  <?php include 'footer.php'; ?>
</body>
</html>


