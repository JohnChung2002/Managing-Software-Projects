<?php 
include "login-module/is_login.php";
echo "Logged in: " . $_SESSION["user_id"]; 
echo "Logged in role: " . $_SESSION["user_role"];
?>
