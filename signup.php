<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up Cacti Succulent</title>
    <?php include 'header.php'; ?>
    <?php include 'page_head.php'; ?>
</head>
<body>
    <script src="script/password-integrity.js"></script>
    <?php include 'auth/signup-process.php'; ?>
    <div class="container p-3 vh-100">
      <span><?php if(isset($_SESSION['signupMsg'])){echo $_SESSION['signupMsg']; session_unset();} ?></span>
      <form class="needs-validation" method="post" id="signupreset-form" novalidate>
          <fieldset>
              <legend>Sign Up</legend>
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" pattern="^[a-zA-Z][a-zA-Z ]+$" class="form-control" placeholder="John Pie" required>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Only letters and white space allowed.</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" id="email" pattern="^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-zA-Z0-9]+(?:-+[a-zA-Z0-9]+)*\.){1,126}){1,}(?:(?:[a-zA-Z][a-zA-Z0-9]*)|(?:(?:xn--)[a-zA-Z0-9]+))(?:-+[a-zA-Z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){7})|(?:(?!(?:.*[a-fA-F0-9][:\]]){7,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){5}:)|(?:(?!(?:.*[a-fA-F0-9]:){5,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$" class="form-control" placeholder="JohnPie@email.com" required>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please enter a valid email.</div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                  <input type="text" pattern="^[0-9]{10}$" class="form-control" name="phone" id="phone" aria-describedby="helpId" required>
                  <small id="helpId" class="form-text text-muted">0102348293</small>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>
              </div>

              <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <!-- </div> -->
                  <div class="col-sm-10">
                    <input type="password" name="password" id="password" minlength="8" maxlength="20" oninput="passwordHash()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z\d\W]{8,20}$" class="form-control" aria-describedby="passwordHelpInline"  required>
                    <span id="passwordHelpInline" class="form-text">
                    Enter a password of at least 8 characters including 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol.
                    </span>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol.</div>
                  </div>
              </div>
              <br/>

              <input type="text" name="hashValue" id="hashValue" hidden />

              <div class="row mb-3">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default selected example" name="gender" id="gender" required>
                    <option disabled selected value=""> -- select an option -- </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">Please select your gender.</div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </fieldset>
      </form>
      <script src="script/validate.js"></script>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
