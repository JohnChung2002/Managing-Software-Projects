
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plant Encyclopedia</title>
    <?php include "page_head.php";?>
</head>
<body>
	<?php include 'header.php'; ?>
	
<h1 class="text-center mt-5">Plant Encyclopedia</h1>
<div class="container mt-5">
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="plant_encyclopedia.php">Plant Encyclopedia</a></li>
    <li class="breadcrumb-item active" aria-current="page">Availability</li>
  </ol>
</nav>
</div>	
<div class="container my-4 p-5 border" style="background-image:url('images/texture_background.jpeg');">
<button class="btn btn-dark" onclick="window.location.href='plant_details.php'">All</button>
<button class="btn btn-dark mx-2" onclick="window.location.href='plant_price.php'">Sort by Price</button>
<button class="btn btn-light" disabled>Filter by Availability</button>
<br>
<br>
<label for="" class='fw-bold fs-5'>Item ID:</label>
<?php  
        include 'encyclopedia/plant.php';
?>
</div>
<div class="container p-5 my-5 border">
    <div class='row'>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php';
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed(because there is no data in the database yet): " . $conn->connect_error);
	}
	$sql = "SELECT * FROM encyclopedia_items WHERE (item_category='Plants' OR item_category='Seeds') AND availability_in_store='Available'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	echo 
	"<div class='col-md-4 mb-4'>
		<div class='card mb-4 shadow-sm h-100'>
			<div class='card-body' style='cursor: pointer;' onclick='window.location.href=\"plant_availability.php\"'>
				<p class='card-text fw-bold text-center'> 
                            Item ID:
                            ".$row["item_id"]."			
                 </p>
				 <img class='img-fluid my-3' src=".$row["item_image"]."/>
				 <br>
				 <p class='card-text text-center'> 
                            Item Name:
                            ".$row["item_name"]."
                 </p>
				 <p class='card-text text-center'> 
                            Availability in store:
                            ".$row["availability_in_store"]."			
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