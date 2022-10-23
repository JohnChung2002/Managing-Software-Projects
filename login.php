<?php
  include 'auth/redirect_logged_in.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Cacti Succulent</title>
    <?php include 'page_head.php'; ?>
    <?php include 'auth/login-process.php'; ?>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container p-3 vh-100">
    <span><?php if(isset($_SESSION['loginMsg'])){echo $_SESSION['loginMsg']; session_unset();} ?></span>
    <form action="login.php" method="post" id="login-form">
        <fieldset>
            <legend class="mx-2">Log In</legend>

            <div class="row mb-3 mx-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" placeholder="JohnPie@email.com" required>
              </div>
            </div>

            <div class="row mb-3 mx-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Log In</button>
        </fieldset>
    </form>

    <a href="resetpassword.php" class="link-primary d-block mt-2">Forgot password?</a>
</div>
</body>
<footer>
    <?php include 'footer.php'; ?>
</footer>

</html>
