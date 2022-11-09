<?php 
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fertilizer Encyclopedia</title>
    <?php include "page_head.php";?>
</head>
<body>
	<?php include 'header.php'; ?>
  <h1 class="text-center mt-5">Fertilizer Encyclopedia</h1>
  <div class="container p-5 my-5 border">
    <div class="d-grid gap-2">
      <button type='button' class='btn btn-primary' onclick='window.location.href="admin_encylopedia_additem.php"'>Add New Fertilizer</button>
      <br>
    </div>
    <div class='row'>
<?php
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed(because there is no data in the database yet): " . $conn->connect_error);
	}
	$sql = "SELECT item_id, item_category, item_subcategory, item_name, item_image, availability_in_store, price_in_store, description FROM encyclopedia_items WHERE item_category='Fertiliser' OR item_category='Compost & Soil'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	echo 
	"<div class='col-md-4'>
		<div class='card mb-4 shadow-sm'>
			<div class='card-body'>
				<p class='card-text'>
				  <img class='img-fluid' src=".$row["item_image"]."/>
                            <br>
                            Item Name: 
                            ".$row["item_name"]."
                            <br>
                            Item ID: 
                            ".$row["item_id"]."
                            <br>                    
                            Item Subcategory: 
                            ".$row["item_subcategory"]."
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

                <div class='d-flex justify-content-between align-items-center'>
                    <div class='btn-group'>
                        <button type='button' class='btn btn-primary' onclick='window.location.href=\"admin_encylopedia_edititem.php?id=". $row["item_id"] ."\"'>Edit Item</button>
                        <button type='button' class='btn btn-danger' onclick='window.location.href=\"admin_encyclopedia_deleteitem.php?id=". $row["item_id"] ."\"'>Delete Item</button>
                    </div>
                </div>
            </div>
        </div>
    </div>";
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