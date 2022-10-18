<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Cacti Succulent</title>
    <?php include 'header.php'; ?>
    <?php include 'page_head.php'; ?>
</head>
<body>
  <div class="container p-3 vh-100">
    <form action="login-module/login-process.php" method="post" id="login-form">
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
                  <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline">
                  <span id="passwordHelpInline" class="form-text">
                    Must be 8-20 characters long.
                  </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block">Log In</button>
        </fieldset>
    </form>
</div>
</body>
<footer>
    <?php include 'footer.php'; ?>
</footer>

</html>
