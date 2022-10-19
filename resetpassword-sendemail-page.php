<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <?php include 'header.php'; ?>
    <?php include 'page_head.php'; ?>
    <?php include 'reset-password-module/resetpassword-sendemail-process.php'; ?>
</head>
<body>
  <div class="container p-3 vh-100">
    <span><?php if(isset($_SESSION['rstpassMsg'])){echo $_SESSION['rstpassMsg']; session_unset();} ?></span>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
            <legend class="mx-2">Reset Password</legend>

            <div class="row mb-3 mx-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" placeholder="JohnPie@email.com" required>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block">Send Reset Password Link</button>
        </fieldset>
    </form>
</div>
</body>
<footer>
    <?php include 'footer.php'; ?>
</footer>

</html>
