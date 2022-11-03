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
        if (isset($_POST["mytextarea"])) {	 
            echo "You entered: " . $_POST["mytextarea"];
        }
        ?>

        <form method="POST">
            <textarea name="mytextarea">
            Welcome to TinyMCE!
            </textarea>
            <script>
            tinymce.init({
                selector: 'textarea',   
                plugins: 'save anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | addcomment showcomments | spellcheckdialog | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat ',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Cacti Succulent Kuching',
             });
            </script>
            <input type="submit" value="Submit">
        </form>



        <?php include 'footer.php'; ?>
    </body>
</html>