<!-- Check if the user is logged in -->
<?php
    session_start();
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){
        if ($_SESSION['user_role'] == "User" || $_SESSION['user_role'] == "Admin") {
            //header("Location: dashboard.php");
        } 
    }
    // Redirect to login page if not logged in.
    header("Location: ../login-page.php");
?>