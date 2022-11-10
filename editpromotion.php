<?php
    # include 'auth/is_admin.php';
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
        <?php include 'database_credentials.php'; ?>
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
            <table class="table">
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
                        <a href="homepage-promotion/deletepromotion.php?content_id=<?php echo $row["content_id"]; ?>">Delete</a>
                        <a href="homepage-promotion/editpromotion.php?content_id=<?php echo $row["content_id"]; ?>">Edit</a>
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

        <?php 
        include 'footer.php'; 
        $conn->close();
        ?>
    </body>

</html>