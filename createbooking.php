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

<body>
<?php include 'header.php'; ?>
  <h1 class="text-center mt-5">APPOINTMENT REQUEST</h1>

  <form class="row g-3">
  <div class="container p-5 my-5 border">

  <div class="mb-3">
  <label for="entername" class="form-label">Name</label>
  <input class="form-control" id="entername" type='text' placeholder="John" rows="1" required>
  <div class="invalid-feedback">Please enter name!</div>
  </div>

  <div class="mb-3">
    <label for="enteremail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="enteremail" placeholder="name@example.com">
    <div class="invalid-feedback">Please enter email address!</div>
  </div>

  <div class="mb-3 ">
      <label for="phoneno" class="form-label">Phone number</label>
      <input type="text" class="form-in form-control" name="" id="phoneno" placeholder="0123456789"/>
      <div class="invalid-feedback">Please enter phone number!</div>
    </div>


<div class="col-12">
    <label for="inputService" class="form-label">Select a service</label>
    <select id="inputService" class="form-select">
      <option selected>Choose...</option>
      <option>Buy plant</option>
      <option>Buy fertilizer</option>
      <option>Buy gardening tool</option>
      <option>Other</option>
    </select>
    <div class="invalid-feedback">Please select a service!</div>
</div>

<div id="datepicker-container"></div>

<div class="mb-3">
  <label for="available-slot" class="form-label">Available Time</label>
    <select class="form-select form-select-lg" name="available-slot" id="available-slot">
    </select>
    <div class="invalid-feedback">Please choose a time!</div>
</div>

  <div class="pb-3 col-12">
    <label for="inputPpl" class="form-label">How many people will be joining?</label>
    <select id="inputPpl" class="form-select">
      <option selected>Choose...</option>
      <option>1-3</option>
      <option>3-5</option>
      <option>6></option>
    </select>
    <div class="invalid-feedback">Please choose!</div>
  </div>



  <div class="col-12">
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Book Now</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </div>

<div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Your booking has been placed!</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Thanks for booking!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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
       
  // var currentTab = 0;
  // var form_fields = [document.getElementById("entername"), document.getElementById("enteremail"), document.getElementById("phoneno"), document.getElementById("inputService"), document.getElementById("available-slot"), document.getElementById("inputPpl")];
  // showTab(currentTab);

  </script>
</div>
<?php include 'footer.php'; ?>

</body>
</html>