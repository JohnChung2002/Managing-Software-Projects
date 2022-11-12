<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
} else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cacti_succulent_kuching";
}
?>