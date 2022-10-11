<?php 
require_once '../database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO homepage_info (page_resource, remarks) VALUES ('<h1>This is version 1</h1><p>You are now viewing version 1</p>', 'Modified to Version 1');";
$command .= "INSERT INTO homepage_info (page_resource, remarks) VALUES ('<h1>This is version 2</h1><p>You are now viewing version 2</p>', 'Modified to Version 2');";
$command .= "INSERT INTO homepage_info (page_resource, remarks) VALUES ('<h1>This is version 3</h1><p>You are now viewing version 3</p>', 'Modified to Version 3');";
$command .= "INSERT INTO homepage_info (page_resource, remarks) VALUES ('<h1>This is version 4</h1><p>You are now viewing version 4</p>', 'Modified to Version 4');";
$command .= "INSERT INTO homepage_info (page_resource, remarks) VALUES ('<h1>This is version 5</h1><p>You are now viewing version 5</p>', 'Modified to Version 5');";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
