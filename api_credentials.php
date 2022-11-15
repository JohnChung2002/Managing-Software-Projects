<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
} 
$api_link = "https://script.google.com/macros/s/AKfycbxeWRGhM53wxGDGvQ94pDqX1kP0szPwrDIWkbyIf1FA4owjhaKeiRsnTXUmSphJMYA/exec";
$api_key = "EB3914D9F167D9A414DF438C7D4CD";
?>