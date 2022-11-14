<?php
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <?php include 'page_head.php'; ?>
    <title>Profile Page</title>
</head>
<body>
<?php include 'header.php';
    include 'profile/profile_info.php';
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $preference = $_SESSION['preference'];
    $profileImg = $_SESSION['profileImg'];

    echo"
    <div class='container p-5 align-items-center justify-content-center'>
        <h2 class='m-2'>Your Profile</h2>
        <div class='col-auto'>
            <button type='button' class='btn btn-outline-primary float-end' onclick=\"location.href='profilepage-edit.php';\"> Edit Profile</button>
        </div>
        <div class='row'>
            <div class='profile-img'>
                <img src='$profileImg' class='rounded mx-auto d-block' alt='$name Profile Picture' />
            </div>
        </div>
        <div class='row'>
            <div class='col p-5'>
                <div class='row my-3 border border-dark rounded-pill p-2'>
                    <div class='col-md-6 d-flex align-items-center'>
                        <label>Name</label>
                    </div>
                    <div class='col-md-6 d-flex align-items-center'>
                        <p id='name'>$name</p>
                    </div>
                </div>
                <div class='row my-3 border border-dark rounded-pill p-2'>
                    <div class='col-md-6 d-flex align-items-center'>
                        <label>Email</label>
                    </div>
                    <div class='col-md-6'>
                        <p id='email'>$email</p>
                    </div>
                </div>
                <div class='row my-3 border border-dark rounded-pill p-2'>
                    <div class='col-md-6 d-flex align-items-center'>
                        <label>Phone</label>
                    </div>
                    <div class='col-md-6'>
                        <p id='phone'>$phone</p>
                    </div>
                </div>
                <div class='row my-3 border border-dark rounded-pill p-2'>
                    <div class='col-md-6 col-md-6 d-flex align-items-center'>
                        <label>Preference</label>
                    </div>
                    <div class='col-md-6 content_center'>
                        <p id='preference'>$preference</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
  include 'footer.php';
  ?>
</body>
</html>