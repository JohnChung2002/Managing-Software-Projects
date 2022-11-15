<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
} 
$api_link = "https://script.google.com/macros/s/AKfycbzAWgxFakT6vml6nL5y2G4ocfJf4vKqCvp1z3Sq878v0ImimkYpiUAu8GCSnvu1wto/exec";
$api_key = "EB3914D9F167D9A414DF438C7D4CD";
?>