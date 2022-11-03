<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
} 
$api_link = "https://script.google.com/macros/s/AKfycbxASiEeDjCOlW11O0o9zX3ksAY35EHQh6X6ywj-f3HZxElREbLhHEBm5LUoWVkoD_w/exec";
$api_key = "EB3914D9F167D9A414DF438C7D4CD";
?>