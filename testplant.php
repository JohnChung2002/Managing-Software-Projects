<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plant Encyclopedia</title>
    <?php include "page_head.php";?>
</head>
<body>
	<?php include 'header.php'; ?>
	

  <h1 class="text-center mt-5">Plant Encyclopedia</h1>
  <div class="container p-5 my-5 border">
    <div class='row'>


<?php
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed(because there is no data in the database yet): " . $conn->connect_error);
	}
	$sql = "SELECT item_id, item_category, item_subcategory, item_name, item_image, availability_in_store, price_in_store, description FROM encyclopedia_items WHERE item_category='Plants'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	echo 
	"<img src= '".$row["item_image"]."' class='w-50'/>
	<p>Item ID: 
	".$row["item_id"]."
	<br>
	Item Category: 
	".$row["item_category"]."
	<br>
	Item Subcategory: 
	".$row["item_subcategory"]."
	<br>
	Item Name: 
	".$row["item_name"]."
	<br>
	Item Image: 
	".$row["item_image"]."
	<br>
	Availability in store: 
	".$row["availability_in_store"]."
	<br>
	Price in store: 
	".$row["price_in_store"]."
	<br>
	Description: 
	".$row["description"]."
	</p>
	";
	}
	
	} else {
		echo "0 results";
	}

	$conn->close();

?>

  </div>
  </div>


<?php include 'footer.php'; ?>
</body>
</html>