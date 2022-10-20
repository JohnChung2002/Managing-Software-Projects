<!-- Check if the user is logged in -->
<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }
    session_start();
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){
        if ($_SESSION['user_role'] == "User" || $_SESSION['user_role'] == "Admin") {
            return;
        } 
    }
    // Redirect to login page if not logged in.
    header("Location: ../login-page.php");
    exit;
?>