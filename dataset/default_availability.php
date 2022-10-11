<?php 
require_once '../database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('Sunday', NULL);";
$command .= "INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('Monday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]');";
$command .= "INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('Tuesday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]');";
$command .= "INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('Wednesday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]');";
$command .= "INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('Thursday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]');";
$command .= "INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('Friday', '[\"09:00:00-12:00:00\", \"13:00:00-17:00:00\"]');";
$command .= "INSERT INTO default_store_availability (day_of_week, operating_hours) VALUES ('Saturday', NULL);";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
