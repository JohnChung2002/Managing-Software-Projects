<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gardening Tools Encyclopedia</title>
    <?php include "page_head.php";?>
</head>
<body>
	<?php include 'header.php'; ?>
	
<h1 class="text-center mt-5">Gardening Tools Encyclopedia</h1>	
<div class="container my-5 p-5 border" style="background-image:url('images/texture_background.jpeg');">
<button class="btn btn-dark" onclick="window.location.href='gardeningtools_encyclopedia.php'">All</button>
<button class="btn btn-light mx-2" disabled>Sort by Price</button>
<button class="btn btn-dark" onclick="window.location.href='gardening_tools_availability.php'">Filter by Availability</button>
<br>
<br>
<label for="" class='fw-bold fs-5'>Item ID:</label>
<?php  
        include 'encyclopedia/gardening_tools.php';
?>
</div>
<div class="container p-5 my-5 border">
    <div class='row'>
<?php
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed(because there is no data in the database yet): " . $conn->connect_error);
	}
	$sql = "SELECT * FROM encyclopedia_items WHERE (item_category='Tools & Accessories' OR item_category='Pesticides' OR item_category='Pots & Vases') AND price_in_store > 0 ORDER BY price_in_store ASC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	echo 
	"<div class='col-md-4 mb-4'>
		<div class='card mb-4 shadow-sm h-100'>
			<div class='card-body'>
				<p class='card-text fw-bold text-center'> 
                            Item ID:
                            ".$row["item_id"]."			
                 </p>
				 <img class='img-fluid my-3' src=".$row["item_image"]."/>
				 <br>
				 <p class='card-text text-center'> 
                            Price: RM
                            ".$row["price_in_store"]."			
                 </p>		
			</div>
		</div>
	</div>";
}
	} else{
           echo "<p class='fw-bold fs-4 text-center'>No Record Found</p>";}
	$conn->close();
?>
	</div>
</div>
  
<?php include 'footer.php'; ?>
</body>
</html>