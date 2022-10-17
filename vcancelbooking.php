<!DOCTYPE html>
<head>
    <!--javascript for bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--css for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container p-5 my-5 border">
<h1> Cancel Booked Appointment</h1>
<form class="row g-3">
  <div class="col-md-6">
  <label for="inputReason" class="form-label">Reason For Cancellation</label>
    <select id="inputReason" class="form-select">
      <option selected>Choose...</option>
      <option>Scheduling Conflict</option>
      <option>Emergency</option>
      <option>Illness</option>
    </select>
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
    <button type="submit" class="btn btn-primary">Confirm</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </div>
</form>

</body>
</html>
