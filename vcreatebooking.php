<!DOCTYPE html>
<head>
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

<body class="container p-5 my-5 border">
<h1> Booking Appointment</h1>
    <div id="datepicker-container"></div>
    <div class="mb-3">
        <label for="available-slot" class="form-label">Available Time</label>
        <select class="form-select form-select-lg" name="available-slot" id="available-slot">
        </select>
    </div>

<form class="row g-3">
  <div class="col-md-6">
    <label for="inputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputName">
  </div>
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail">
  </div>
  <div class="col-12">
    <label for="inputPhone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="inputPhone" placeholder="xxx-xxxxxxx">
  </div>
  <div class="col-12">
    <label for="inputReason" class="form-label">Reason for visit</label>
    <select id="inputReason" class="form-select">
      <option selected>Choose...</option>
      <option>Buy plant</option>
      <option>Buy fertilizer</option>
      <option>Buy gardening tool</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Book Now</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </div>
</form>

    <script src="script/datepicker.js"></script>
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
</body>
</html>
