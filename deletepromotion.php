<?php
  include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Deleting Content</title>
</head>
<body id='version_id'>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php'; ?>
    <?php

        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        $content_id = (int)$_GET['content_id'];
        $sql = "DELETE FROM content_info WHERE content_id=?;";      
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $content_id);
    ?>

<div class="container border border-success w-50 rounded my-5 " >
  <div class="row text-center">
    <div class="col-4 w-100">
      <h1 class="text-uppercase my-5">
      <?php
      if ($stmt->execute()) {
        echo 'Content has been deleted successfully ';
      } 
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      ?>
      </h1>
    </div>
    <div class="row justify-content-center">
      <div class=" col-4 fs-4 w-75 my-5 ">
        <button type="button" class="btn btn-success position-absolute top-70 start-50 translate-middle mt-1">
        <a class="text-white" href="promotioninfo.php">Go Back </a>
        </button>
      </div>
    </div>
  </div>
</div>
        <?php
            mysqli_close($conn);
        ?>

</body>
</html>