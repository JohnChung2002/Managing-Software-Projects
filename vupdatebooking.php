<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <?php include "page_head.php";?>
    <!--for ajax requests-->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- javascript for the calendar (date picker)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--css for the calendar (date picker)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--javascript for bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--css for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body">
<?php include 'header.php';
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
            <input type='text' pattern='^[1-9]\d*(?:\.\d+)?$' class='form-control' id='inputPpl' name='inputPpl' required>
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
            var start_date = formatNewDate(new Date())
            updateDisabled(start_date).then(function(data) {
                disabledDates = data;
                loadDatePicker();
            });
            });
        </script>
        <script src='script/booking_validation.js'></script>
    </div>";
  } else {
    echo '<script type="text/javascript">
    window.location.href = \'vbhistory.php\';
    </script>';
  }
}?>  
<?php include 'footer.php'; ?>
</body>
</html>

