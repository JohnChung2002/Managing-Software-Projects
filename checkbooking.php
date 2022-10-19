
<!DOCTYPE html>
<head>
    <!--javascript for bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--css for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<?php include 'header.php'; ?>
  <h1 class="text-center mt-5">APPOINTMENT HISTORY</h1>

  <form class="container my-3 bg-light w-50 align-items-center" id="regForm" action="">
    <h1 class="mb-3 mx-5">Checking Booking Appointment</h1>
    
    <!-- One "tab" for each step in the form: -->
    <div class="mb-3 mx-5">
      <label for="booking_id" class="form-label">Check by Booking ID:</label>
      <input type="text" class="form-in form-control" name="" id="booking_id" placeholder="Enter booking ID"/>
      <div class="invalid-feedback">Please enter a booking id!</div>

        <label for="calender" class="form-label">Check by Date</label>
        <div id="sandbox-container" oninput="this.className = ''"></div>
                <script>
                    var disabledDates = ["2022-10-15","2022-10-14","2022-10-19"]
                    $('#sandbox-container').datepicker({
                    beforeShowDay: function(date){
                        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [ disabledDates.indexOf(string) == -1 ]
                        },
                        format: "dd/mm/yyyy",
                        startDate: "now"
                        }); 
                </script>
    </div>

<a class="mb-3 mx-5 btn btn-primary" role="button" href="checkresults.php">Submit</a>
</form>
  <?php include 'footer.php'; ?>


</body>
</html>