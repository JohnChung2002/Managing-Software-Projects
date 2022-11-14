<?php 
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php";?>
    <title>Gardening Encyclopedia</title>
    <style>
      aside{
        width: 25%;
      }
      </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container border border-success rounded my-5">
        <div class="col-4 w-100">
            
        <?php 
            include "encyclopedia_functions.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                deleteEncylopediaItem();
                echo"
                <div class='d-grid gap-2'>
                  <a href='admin_encyclopedia_interface.php'><button type='button' class='btn btn-primary'>Back To Encyclopedia</button></a>
                  <br>
                </div>
                ";
            } else {
                echo"
                <h1 class='text-uppercase my-4 text-center'>Delete Existing Item</h1>
                <p class='text-center'>Your are now deleting this item from the encyclopedia.</p>";
                getEncyclopediaDetails($_GET["id"]);
                echo "
                <form method='post' class='row g-3 needs-validation' novalidate>
                <div class='col-12 text-center'>
                    <button type='submit' class='btn btn-primary'>Delete Item</button>
                    <button type='reset' class='btn btn-primary'>Cancel</button>
                </div>
                </form>
                ";
            }
            
        ?>
        <br/>
        <br />
        </div>
    </div>
  <?php include 'footer.php'; ?>
</body>
</html>