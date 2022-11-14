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
              editEncylopediaItem();
            } else {
                echo"
                <h1 class='text-uppercase my-4 text-center'>Edit Existing Item</h1>
                <p class='text-center'>Your are editing deleting this item from the encyclopedia.</p>
          <br/>
          <aside class='float-end'>
              Instructions for uploading image: <br/>
                1. Head over to <a target=”_blank” href='https://imgur.com/upload'>Imagur</a> to upload an image. <br/>
                2. Upload the image/copy the link of the image from online and paste it in the box. <br/>
                3. Hover over the image to show the copy link button and click it. <br />
                4. Paste it in to the 'Item Image' field and add .jpeg behind the link!
          </aside>";
                retrieveFormDetails($_GET["id"]);
                
            }
            
        ?>
          <br />
        </div>
    </div>
  <?php include 'footer.php'; ?>
</body>
</html>