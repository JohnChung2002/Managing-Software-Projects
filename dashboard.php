<?php 
include "auth/is_loggedin.php";
echo "Logged in: " . $_SESSION["user_id"]; 
echo "Logged in role: " . $_SESSION["user_role"];
?>
