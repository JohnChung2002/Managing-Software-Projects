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

            <div class="col-md-4">
                <label for="inputState" class="form-label">Choose Type</label>
                <select id="inputState" class="form-select">
                    <option selected>Announcement</option>
                    <option>Promtotion</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Title</label>
                <input type="title" class="form-control" id="content_title">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Image</label>
                <input type="file" class="form-control" id="content_image">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>

    

        <?php 
        include 'footer.php'; 
        $conn->close();
        ?>
    </body>

</html>