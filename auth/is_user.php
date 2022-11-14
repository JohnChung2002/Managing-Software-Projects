<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    session_start();
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){
        if ($_SESSION['user_role'] == "User") {
            return true;
        } 
    }
    
    header("Location: login.php");
    exit;
?>