<?php
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Edit Profile Page</title>
</head>
<body>
<?php include 'header.php';
    include 'profile/profile-edit-process.php';
    include 'profile/profile_info.php';
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $preference = $_SESSION['preference'];
    $profileImg = $_SESSION['profileImg'];
    echo "<div class='container p-5 align-items-center justify-content-center'>";
    if(isset($_SESSION['editMsg'])){
        $msg = $_SESSION['editMsg']; 
        unset($_SESSION['editMsg']);
        echo "<span>$msg</span>";
    }
?>
    <script src="script/password-integrity.js"></script>
        <form class="needs-validation" action="profilepage-edit.php" method="post" id="signupreset-form"  enctype="multipart/form-data" novalidate>
            <fieldset>
                <legend>Edit Profile</legend>
                <div class="row mb-3">
                    <div class='profile-img'>
                        <img src='<?php echo"$profileImg";?>' class='rounded mx-auto d-block' alt='<?php echo"$name's";?> Profile Picture' />
                    </div>
                    <h6>Upload Profile Picture</h6>
                    <input type="file" name="image" id="image" class="text-center center-block file-upload">
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" pattern="^[a-zA-Z][a-zA-Z ]+$" class="form-control" value='<?php echo"$name"; ?>' required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Only letters and white space allowed.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" pattern="^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-zA-Z0-9]+(?:-+[a-zA-Z0-9]+)*\.){1,126}){1,}(?:(?:[a-zA-Z][a-zA-Z0-9]*)|(?:(?:xn--)[a-zA-Z0-9]+))(?:-+[a-zA-Z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){7})|(?:(?!(?:.*[a-fA-F0-9][:\]]){7,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){5}:)|(?:(?!(?:.*[a-fA-F0-9]:){5,})(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3})?::(?:[a-fA-F0-9]{1,4}(?::[a-fA-F0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$" class="form-control" value='<?php echo"$email"; ?>' required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" pattern="^[0-9]{10,11}$" class="form-control" name="phone" id="phone" value='<?php echo"$phone"; ?>'required>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="oldpassword" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="oldpassword" id="oldpassword" minlength="8" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z\d\W]{8,20}$" class="form-control" aria-describedby="passwordHelpInline"  required>
                        <span id="passwordHelpInline" class="form-text">
                        Enter your current password.
                        </span>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" minlength="8" maxlength="20" oninput="passwordHash()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z\d\W]{8,20}$" class="form-control" aria-describedby="passwordHelpInline"  required>
                        <span id="passwordHelpInline" class="form-text">
                        Enter a password of at least 8 characters including 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol.
                        </span>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number and 1 symbol.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="preference" class="col-sm-2 col-form-label">Preference</label>
                    <div class="col-sm-10">
                        <input type="text" name="preference" id="preference" pattern="^[a-zA-Z,][a-zA-Z, ]+$" class="form-control" aria-describedby="passwordHelpInline" value='<?php echo"$preference"; ?>' required>
                        <span id="passwordHelpInline" class="form-text">
                        Enter your preference. (Separated by commas)
                        </span>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Only letters, white space and commas allowed.</div>
                    </div>
                </div>

                <input type="text" name="hashValue" id="hashValue" hidden />

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <?php
                    if($_SESSION['user_role'] == "User"){
                    echo '<button type="button" class="btn btn-outline-danger float-end" onclick="location.href="deleteaccount-user.php";">Delete Account</button>';}
                ?>
            </fieldset>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>