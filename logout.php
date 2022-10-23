<!-- Log out the user/admin -->
<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
?>