<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset Password</title>
        <?php include 'header.php'; ?>
        <?php include 'page_head.php'; ?>
    </head>
    
    <body>
        <script src="signup-module/password-integrity.js"></script>
        <?php include 'reset-password-module/reset-password-process.php'; ?>
        <div class="container p-3 vh-100">
            <span><?php if(isset($_SESSION['rstpassMsg'])){echo $_SESSION['rstpassMsg']; session_unset();} ?></span>
            <?php if(isset($_GET['token'])){$token=$_GET['token'];}else{$token="";}?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?token='. $token); ?>" method="post" onsubmit="passwordHash(); return false;" id="signupreset-form">
                <fieldset>
                    <legend>Reset Password</legend>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <!-- </div> -->
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control <?php if($passwordMsgBool['password']!=''){if($passwordMsgBool['is_valid']){echo 'is-valid';}else{echo 'is-invalid';}} ?>" aria-describedby="passwordHelpInline" required>
                            <span id="passwordHelpInline" class="form-text">
                            Must be 8-20 characters long.
                            </span>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback"><?php echo $passwordMsgBool['errMsg'];?></div>
                        </div>
                    </div>

                    <input type="text" name="hashValue" id="hashValue" hidden />
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </fieldset>
            </form>
        </div>
    </body>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</html>