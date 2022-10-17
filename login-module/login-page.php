<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Cacti Succulent</title>
    <?php include '../header.php'; ?>
    <?php include '../page_head.php'; ?>
</head>
<body>
    <script src="password-integrity.js"></script>
    <form action="login-process.php" method="post" id="signup-form">
        <fieldset>
            <legend>Log In</legend>
            
            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" placeholder="JohnPie@email.com" required>
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
          
            <button type="submit" class="btn btn-primary">Log In</button>
        </fieldset>
    </form>
</body>

</html>