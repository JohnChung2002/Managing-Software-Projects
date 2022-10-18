<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up Cacti Succulent</title>
    <?php include 'header.php'; ?>
    <?php include 'page_head.php'; ?>
</head>
<body>
    <script src="signup-module/password-integrity.js"></script>
    <!-- <?php include 'navbar.php'; ?> -->
    <form class="container" action="signup-module/signup-process.php" method="post" onsubmit="passwordHash(); return false;" id="signup-form">
        <fieldset>
            <legend>Sign Up</legend>

            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control is-valid" placeholder="John Pie" required>
                <div class="valid-feedback">
                  Looks good!
                </div>            
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" placeholder="JohnPie@email.com" required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="helpId" required>
                <small id="helpId" class="form-text text-muted">0102348293</small>
              </div>
            </div>

            <div class="row mb-3">
                <!-- <div class="col-auto"> -->
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <!-- </div> -->
                <div class="col-sm-10">
                  <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline">
                  <span id="passwordHelpInline" class="form-text">
                    Must be 8-20 characters long.
                  </span>
                </div>
            </div>
            <br/>
            <input type="text" name="hashValue" id="hashValue" hidden />
            
            <div class="row mb-3">
              <label for="gender" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default selected example" name="gender" id="gender">
                  <option disabled selected value> -- select an option -- </option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</body>

</html>