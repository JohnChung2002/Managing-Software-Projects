<?php
    # include 'auth/is_admin.php';
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'page_head.php'; ?>
        <script src="https://cdn.tiny.cloud/1/pa1myav7w2ag023kos2mm4meskw8zg8lnk8o6wjescoiofe4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <title>Cacti Succulent Kuching</title>
        <script>
            tinymce.init({
                selector: 'textarea',   
                plugins: 'save anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | addcomment showcomments | spellcheckdialog | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat ',
                tinycomments_mode: 'embedded',
                height: '700px', 
                tinycomments_author: 'Cacti Succulent Kuching',
                autosave_restore_when_empty: true,
             });
             
        </script>
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

        <form method="POST" id="edit_form" class = "justfiy-content-center"action="homepage-promotion/editprocess.php" >
            <h1 class = "mb-3 ms-3 mt-3"> Welcome to homepage edit</h1>
            <div class = "mb-3">
                <textarea name="page_resource">
                    <?php 
                        $sql = "SELECT page_resource FROM Homepage_info ORDER BY version_id DESC LIMIT 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo $row["page_resource"];
                            }
                        } else{
                            echo "0 results";
                        }
                        
                    ?>
                </textarea>
            </div>
            <div class="input-group p-3">
				<label class = "mx-3" for = "remarks">Remarks</label>
                <input  class="form-control" type = "text" id="remarks" name ="remarks"/>
			</div>
            <div class = "btn btn-success mb-3 ms-3">
			    <input class = "btn btn-success" type="submit" value="Submit"/>
		    </div>
        </form>
        



        <?php 
        include 'footer.php'; 
        $conn->close();
        ?>
    </body>
</html>