<?php 
$type = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["email"])) {
        $type = 1;
    } else if (isset($_POST["password"]) && isset($_POST["hashValue"])) {
        $type = 2;
    }
} else {
    if (isset($_GET['token']) && isset($_GET['email'])) {
        $type = 3;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <?php include 'page_head.php'; ?>
    <?php if ($type == 1) {
        include 'auth/resetpassword-sendemail-process.php';
    } else if ($type == 2) {
        include 'auth/reset-password-process.php';
    } else if ($type == 3) {
        include 'auth/reset-password-check.php';
        if (!$_SESSION['valid']) {
            $type = 0;
        }
    }
    ?>
</head>
<body>
    <?php include 'header.php';
    echo "<div class='container p-3 vh-100'>";
    if(isset($_SESSION['rstpassMsg'])){
        $msg = $_SESSION['rstpassMsg']; 
        session_unset();
        echo "<span>$msg</span>";
    }
    if ($type == 3) {
        $url = htmlspecialchars($_SERVER["PHP_SELF"].'?token='. $_GET['token']);
        echo '
        <form class="needs-validation" action="'. $url .'" method="post" id="signupreset-form" novalidate>
            <fieldset>
                <legend>Reset Password</legend>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control" minlength="8" maxlength="20" oninput="passwordHash()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z\d\W]{8,20}$" aria-describedby="passwordHelpInline" required>
                        <span id="passwordHelpInline" class="form-text">
                        Enter a password of at least 8 characters including 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol.
                        </span>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol.</div>
                    </div>
                </div>
                <input type="text" name="hashValue" id="hashValue" hidden />
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </fieldset>
        </form>
        <script src="script/password-integrity.js"></script>';
    } else if ($type == 0) {
        echo '
        <form action="resetpassword.php" method="post">
            <fieldset>
                <legend class="mx-2">Reset Password</legend>
                <div class="row mb-3 mx-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" pattern="^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-zA-Z0-9]+(?:-+[a-zA-Z0-9]+)*\.){1,126}){1,}(?:(?:[a-zA-Z][a-zA-Z0-9]*)|(?:(?:xn--)[a-zA-Z0-9]+))(?:-+[a-zA-Z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){7})|(?:(?!(?:.*[a-fA-F0-9][:\]]){7,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){5}:)|(?:(?!(?:.*[a-fA-F0-9]:){5,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$" class="form-control" placeholder="JohnPie@email.com" required>
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Send Reset Password Link</button>
            </fieldset>
        </form>';
    }
    if ($type == 3 || $type == 0) {
        echo "<script src='script/validate.js'></script>";
    }
    echo "</div>";
    include 'footer.php'; ?>
</body>
</html>