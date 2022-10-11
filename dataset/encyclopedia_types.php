<?php 
require_once 'database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Compost & Soil', 1);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Fertiliser', 2);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Pesticides', 3);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Ceramic', 4);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Fiber', 4);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Glass', 4);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Plastic', 4);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Tools & Accessories', 5);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Flower and Fruits', 6);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Vegetables and Herbs', 6);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Orchids', 7);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Succulents', 7);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Herbs', 7);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Fruits', 7);";
$command .= "INSERT INTO encyclopedia_item_types (item_type_name, item_category_id) VALUES ('Seedlings', 7);";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
