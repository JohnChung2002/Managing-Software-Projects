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

        <form method="POST" id="edit_form" action="editprocess.php" >

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
            <div class = "remarks">
				<label for = "remarks">Remarks</label><br><input type = "text" id="remarks" name ="remarks"  />*</br>
			</div>
            <div class = "form-button">
			    <input type="submit" value="Submit"/>
		    </div>
        </form>

        

        <div class = "form-button">
            <button id='page_resource_button' class="button_style" name="New Content">Press to set new content</button>
		</div>

        



        <?php 
        include 'footer.php'; 
        $conn->close();
        ?>
    </body>

    <script>
            const ContentOne = 'page_resource'
            tinyMCE.get('page_resource').getContent();
            tinymce.get("page_resource").setContent("<p>Hello world!</p>");
            function Setcontent() {
                var ContentSet = tinymce.get('page_resource').setContent(contentOne);
            }

            var buttonSet = document.getElementById('page_resource_button');
            buttonSet.addEventListener('click', Setcontent, false);
    </script>
</html>