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
            <h1 class="text-uppercase my-4 text-center">Delete Existing Item</h1>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sql = "SELECT item_id, item_category, item_subcategory, item_name, item_image, availability_in_store, price_in_store, description FROM encyclopedia_items WHERE item_id=?";
                require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
                $conn = new mysqli($servername, $username, $password, $database);
                $item_id = $_POST["item_id"];
                $result = $conn->query($sql);
                $stmt = mysqli_prepare($conn, $command);
                mysqli_stmt_bind_param($stmt, "s", $user_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                echo 
                "<div class='col-md-4'>
                    <div class='card mb-4 shadow-sm'>
                        <div class='card-body'>
                            <p class='card-text'>
                            <img class='img-fluid' src=".$row["item_image"]."/>
                                <br>
                                Item Name: 
                                ".$row["item_name"]."
                                <br>
                                Item ID: 
                                ".$row["item_id"]."
                                <br>
                                Item Subcategory: 
                                ".$row["item_subcategory"]."
                                <br>
                                Availability in store: 
                                ".$row["availability_in_store"]."
                                <br>
                                Price in store: 
                                ".$row["price_in_store"]."
                                <br>
                                Description: 
                                ".$row["description"]."
                            </p>
            
                            <div class='d-flex justify-content-between align-items-center'>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary' onclick='window.location.href=\"admin_encylopedia_edititem.php?id=". $row["item_id"] ."\"'>Edit Item</button>
                                    <button type='button' class='btn btn-danger' onclick='window.location.href=\"admin_encylopedia_deleteitem.php?id=". $row["item_id"] ."\"'>Delete Item</button>
                                </div>
                            </div>
            </div>
            </div>
            </div>";
            }}
        } else {
            echo "0 results";
        }
            $conn->close();
        ?>
            <br/>
        <br />
        </div>
    </div>
  <?php include 'footer.php'; ?>
</body>
</html>