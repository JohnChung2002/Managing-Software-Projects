<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    if(session_status() === PHP_SESSION_NONE) { 
        session_start(); 
    } 
    
    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){
        if ($_SESSION['user_role'] == "Admin" || $_SESSION['user_role'] == "Super Admin") {
            return true;
        } 
    }
    
    header("Location: login.php");
    exit;
?>