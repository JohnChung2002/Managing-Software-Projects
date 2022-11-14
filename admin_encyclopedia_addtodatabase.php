<?php 
    include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php";?>
    <title>Gardening Encyclopedia</title>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container border border-success rounded my-5">
      <div class="row text-center">  
        <div class="col-4 w-100">
          <h1 class="text-uppercase my-4">Add Item Successfully</h1>
          <?php
            require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
            
            if(isset($_POST['productname'])){
              $conn = new mysqli($servername, $username, $password, $database);
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }else{
                echo "Successfully connecting to the database\n";
                echo "<br />";
              }
              
              // get the post records
              $productname = $_POST['productname'];
              $icategory = $_POST['icategory'];
              $isubcategory = $_POST['isubcategory'];
              $iimage = $_POST['iimage'];
              $iavailability = $_POST['iavailability'];
              $iprice = $_POST['iprice'];
              $idesc = $_POST['idesc'];
              
              $sql = "INSERT INTO encyclopedia_items (`item_category`, `item_subcategory`, `item_name`, `item_image`, `availability_in_store`,`price_in_store`,`description`) VALUES ('$icategory', '$isubcategory', '$productname', '$iimage', '$iavailability','$iprice','$idesc')";

              //insert in database 
              $rs = mysqli_query($conn, $sql);
              if($rs){
                echo "Item added successfully.";
              }
            else{
              echo "Error: " . $sql . "<br />" . mysqli_error($conn);
          
            }
            }
          ?>
          
        </div>
          </div>
      
      <p><?php echo "<img class='img-fluid' src=$iimage \>"; ?></p>
      <p>Item Name: <?php echo $productname;?></p>
      <p>Item Category: <?php echo  $icategory;?></p>
      <p>Item Subcategory: <?php echo $isubcategory;?></p>
      <p>Availability in store: <?php echo $iavailability;?></p>
      <p>Price in store: <?php echo $iprice;?></p>
      <p>Description: <?php echo $idesc;?></p>

      
      <div class='d-grid gap-2'>
        <a href='admin_encyclopedia_interface.php'><button type='button' class='btn btn-primary'>Back To Encyclopedia</button></a>
        <br>
      </div>
	    
    </div>
  <?php include 'footer.php'; ?>
</body>
</html>