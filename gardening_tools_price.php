<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gardening Tools Encyclopedia</title>
    <?php include "page_head.php";?>
</head>
<body>
	<?php include 'header.php'; ?>
	
<h1 class="text-center mt-5">Gardening Tools Encyclopedia</h1>	
<div class="container my-5 p-5 border" style="background-image:url('data:image/jpeg;base64,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');">
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