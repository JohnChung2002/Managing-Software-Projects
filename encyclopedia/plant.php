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
	$query = "SELECT * FROM encyclopedia_items WHERE (item_category='Plants' OR item_category='Seeds') AND item_id='$item_id'";
	
    $query_run = mysqli_query($con, $query);
if(mysqli_num_rows($query_run) > 0){
    foreach($query_run as $row){
?>
<br>
<div class="container p-5" style="background-color: white;">
<div class="container w-50 p-3">
<img class='img-fluid' src="<?= $row['item_image'];?>">
</div>
<div class="list-group w-50 mx-auto">
  <a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-center">
      <h5 class="mb-1">Item Name:</h5>
    </div>
    <p class="mb-1 text-center"><?= $row['item_name']; ?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-center">
      <h5 class="mb-1">Availability In Store:</h5>
    </div>
    <p class="mb-1 text-center"><?= $row['availability_in_store']; ?></p>
  </a> 
  <a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-center">
      <h5 class="mb-1">Item Subcategory:</h5>
    </div>
    <p class="mb-1 text-center"><?= $row['item_subcategory']; ?></p>
  </a> 
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-center">
      <h5 class="mb-1">Price in store:</h5>
    </div>
    <p class="mb-1 text-center"> RM <?= $row['price_in_store']; ?></p>
  </a>  
    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-center">
      <h5 class="mb-1">Description:</h5>
    </div>
    <p class="mb-1 text-center"><?= $row['description']; ?></p>
  </a>
</div>
<?php
	}
    }else{
		  echo "<br>";
          echo "<p class='fw-bold fs-4 text-center'>No Record Found</p>";}
    }
?>

</div>
