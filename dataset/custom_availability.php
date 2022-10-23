<?php 
require_once '../database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-20', '[\"09:00:00-12:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-26', '[\"09:00:00-12:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-18', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-11-07', '[\"09:00:00-14:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-11-09', '[\"09:00:00-14:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-25', '[\"09:00:00-12:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-21', '[\"09:00:00-14:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-13', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-11-02', '[\"09:00:00-14:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-17', '[\"09:00:00-12:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-28', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-11-03', '[\"09:00:00-11:00:00\", \"14:00:00-17:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-12', '[\"09:00:00-14:00:00\"]');";
$command .= "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES ('2022-10-19', '[\"09:00:00-14:00:00\"]');";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
