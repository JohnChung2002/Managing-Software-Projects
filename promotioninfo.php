<?php
  include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'page_head.php'; ?>
        <script src="https://cdn.tiny.cloud/1/pa1myav7w2ag023kos2mm4meskw8zg8lnk8o6wjescoiofe4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <title>Cacti Succulent Kuching</title>
        
    </head>

    <body>
        <?php include 'header.php'; ?>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php'; ?>
        <?php
            $conn = mysqli_connect($servername, $username, $password, $database);
            $result = mysqli_query($conn,"SELECT * FROM content_info");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        ?>
        <?php  
		    if (mysqli_num_rows($result) > 0) {
	    ?>
        <div class="container">
            <table class="table table-bordered mx-auto w-75 p-3">
                <tr>
                    <td>Content Id</td>
                    <td>Content Image</td>
                    <td>Content Type</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Action</td>
                </tr>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row["content_id"]; ?></td>
                    <td><img src =<?php echo $row["content_image"]; ?> class="img-thumbnail" alt = "" width="200" height="200"/></td>
                    <td><?php echo $row["content_type"]; ?></td>
                    <td><?php echo $row["content_title"]; ?></td>
                    <td><?php echo $row["content_resource"]; ?></td>
                    <td>
                        <a href="deletepromotion.php?content_id=<?php echo $row["content_id"]; ?>"> <img src = "images/4021663.png" class="img-thumbnail" alt = "" width="50" height="50" /></a>
                        <a href="editpromotion.php?content_id=<?php echo $row["content_id"]; ?>"><img src = "images/84380.png" class="img-thumbnail" alt = "" width="50" height="50" /></a>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
			}
			else{
				echo "No results found";
			}
			?>

            <div class="container w-100 rounded my-5 " >
                    <div class="row text-end">
                        <div class="col-4 w-100">
                        <button type="button" class="btn btn-success justify-content-center">
                            <a href="addpromotion.php" class = "text-white" > Add content </a>
                        </button>
                        </div>
                    </div>
                </div>
        </div>
        <?php 
        include 'footer.php'; 
        $conn->close();
        ?>
    </body>

</html>