<form action="" method="GET" class="d-flex">
    <input class="form-control me-3" type="search" placeholder="Item ID" 
	aria-label="Search" name="item_id" value="
<?php 
	if(isset($_GET['item_id'])){
		echo $_GET['item_id'];
		}?>">
    <button class="btn btn-dark" type="submit">Search</button>
</form>
<?php 
require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
$con = new mysqli($servername, $username, $password, $database);
if(isset($_GET['item_id'])){
    $item_id = $_GET['item_id'];
	$query = "SELECT * FROM encyclopedia_items WHERE (item_category='Fertiliser' OR item_category='Compost & Soil') AND item_id='$item_id'";
	
    $query_run = mysqli_query($con, $query);
if(mysqli_num_rows($query_run) > 0){
    foreach($query_run as $row){
?>
<br>
<div class="container p-5" style="background-color: white;">
<div class="row">
  <div class="col">
	<label for="" class='fw-bold fs-5'>Item Name:</label>
    <input type="text" value="<?= $row['item_name']; ?>" class="form-control">
  </div>
  <div class="col">
	<label for="" class='fw-bold fs-5'>Availability In Store:</label>
    <input type="text" value="<?= $row['availability_in_store']; ?>" class="form-control">
  </div>
  <div class="col">
	<label for="" class='fw-bold fs-5'>Item Subcategory:</label>
    <input type="text" value="<?= $row['item_subcategory']; ?>" class="form-control">
  </div>
</div>
<br>
<div class="row">
  <div class="col">
	<label for="" class='fw-bold fs-5'>Price in store:</label>
    <input type="text" value="RM <?= $row['price_in_store']; ?>" class="form-control">
  </div>
  <div class="col">
	<label for="" class='fw-bold fs-5'>Description:</label>
    <input type="text" value="<?= $row['description']; ?>" class="form-control">
  </div>
</div>
<?php
	}
    }else{
		  echo "<br>";
          echo "<p class='fw-bold fs-4 text-center'>No Record Found</p>";}
    }
?>
</div>