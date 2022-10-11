<?php 
require_once 'database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('Compost & Soil');";
$command .= "INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('Fertiliser');";
$command .= "INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('Pesticides');";
$command .= "INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('Pots & Vases');";
$command .= "INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('Tools & Accessories');";
$command .= "INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('Seeds');";
$command .= "INSERT INTO encyclopedia_item_categories (item_category_name) VALUES ('Plants');";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
