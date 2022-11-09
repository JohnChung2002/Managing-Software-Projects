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
        <?php 
            include 'header.php';
            include 'homepage-promotion/imgurupload.php'; 
        ?>

        <form class ="p-4 vh-100" method="post" id="promotion_form" action = "homepage-promotion/promotionformprocess.php" >

            <div class="col-md-4">
                <label for="content_type" class="form-label">Choose Type</label>
                <select name = "content_type" id="content_type" class="form-select">
                    <option value = "Announcement">Announcement</option>
                    <option value = "Promotion">Promotion</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="content_title" class="form-label">Title</label>
                <input type="title" class="form-control" name = "content_title" id="content_title">
            </div>
            <div class="col-md-6">
                <label for="content_resource" class="form-label">Description</label>
                <input type="text" class="form-control" name = "content_resource" id="content_resource">
            </div>
            <div class="col-md-6">
                <label for="content_image" class="form-label">Image</label>
                <input type="file" class="form-control" name = "content_image" id="content_image">
            </div>
            <div class="pt-4">
                <button type="submit" value="Submit" class="btn btn-success">Submit</button>
            </div>
        </form>

    

        <?php 
        include 'footer.php'; 
        ?>
    </body>

</html>