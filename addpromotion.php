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

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        ?>

        <form method="POST" id="promotion_form"  >

            <textarea name="page_resource">
                
            </textarea>
            <div class = "remarks">
				<label for = "remarks">Remarks</label><br><input type = "text" id="remarks" name ="remarks"  />*</br>
			</div>
            <div class = "form-button">
			    <input type="submit" value="Submit"/>
		    </div>
        </form>

    

        <?php 
        include 'footer.php'; 
        $conn->close();
        ?>
    </body>

</html>