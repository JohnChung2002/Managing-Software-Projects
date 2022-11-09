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
            } else {
                echo"
                <h1 class='text-uppercase my-4 text-center'>Delete Existing Item</h1>
                <p>Your are now deleting this item from the encyclopedia.</p>";
                getEncyclopediaDetails($_GET["id"]);
                echo "
                <form method='post' class='row g-3 needs-validation' novalidate>
                <div class='col-12'>
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