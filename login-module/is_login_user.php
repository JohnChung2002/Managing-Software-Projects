<!-- Check if the user is logged in -->
<?php
    session_start();
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['user_role'] == "User"){
    }else{
        // Redirect to login page if not logged in.
        header("Location: ../login-module/login-page.php");
    }
?>