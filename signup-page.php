<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up Cacti Succulent</title>
    <?php include 'header.php'; ?>
    <?php include 'page_head.php'; ?>
</head>
<body>
    <script src="signup-module/password-integrity.js"></script>
    <?php include 'signup-module/signup-process.php'; ?>
    <div class="container p-3 vh-100">
      <span><?php if(isset($_SESSION['signupMsg'])){echo $_SESSION['signupMsg']; session_unset();} ?></span>
      <form action="signup-page.php" method="post" onsubmit="passwordHash(); return false;" id="signup-form">
          <fieldset>
              <legend>Sign Up</legend>
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" class="form-control <?php if($nameMsgBool['name']!=''){if($nameMsgBool['is_valid']){echo 'is-valid';}else{echo 'is-invalid';}} ?>" placeholder="John Pie" value="<?php echo $nameMsgBool['name'];?>" required>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback"><?php echo $nameMsgBool['errMsg'];?></div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" name="email" id="email" class="form-control <?php if($emailMsgBool['email']!=''){if($emailMsgBool['is_valid']){echo 'is-valid';}else{echo 'is-invalid';}} ?>" placeholder="JohnPie@email.com" value="<?php echo $emailMsgBool['email'];?>" required>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback"><?php echo $emailMsgBool['errMsg'];?></div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control <?php if($phoneMsgBool['phone']!=''){if($phoneMsgBool['is_valid']){echo 'is-valid';}else{echo 'is-invalid';}} ?>" name="phone" id="phone" aria-describedby="helpId" value="<?php echo $phoneMsgBool['phone'];?>" required>
                  <small id="helpId" class="form-text text-muted">0102348293</small>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback"><?php echo $phoneMsgBool['errMsg'];?></div>
                </div>
              </div>

              <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <!-- </div> -->
                  <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control <?php if($passwordMsgBool['password']!=''){if($passwordMsgBool['is_valid']){echo 'is-valid';}else{echo 'is-invalid';}} ?>" aria-describedby="passwordHelpInline">
                    <span id="passwordHelpInline" class="form-text">
                      Must be 8-20 characters long.
                    </span>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback"><?php echo $passwordMsgBool['errMsg'];?></div>
                  </div>
              </div>
              <br/>
              <input type="text" name="hashValue" id="hashValue" hidden />

              <div class="row mb-3">
                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                  <select class="form-control <?php if($_POST['hashValue']!=''){if($genderMsgBool['is_valid']){echo 'is-valid';}else{echo 'is-invalid';}} ?>" aria-label="Default selected example" name="gender" id="gender">
                    <option disabled selected value> -- select an option -- </option>
                    <option value="Male" <?php if($genderMsgBool['gender'] == 'Male'){echo 'selected';}else{echo '';}?> >Male</option>
                    <option value="Female" <?php if($genderMsgBool['gender'] == 'Female'){echo 'selected';}else{echo '';}?> >Female</option>
                  </select>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback"><?php echo $genderMsgBool['errMsg'];?></div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
          </fieldset>
      </form>
    </div>


</body>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</html>
