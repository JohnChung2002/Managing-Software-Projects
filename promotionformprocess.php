<?php
  include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Cacti Succulent Kuching</title>
</head>
<body>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php';
        include $_SERVER['DOCUMENT_ROOT'].'/api/api_functions.php';
        include $_SERVER['DOCUMENT_ROOT'].'/notification/notification_functions.php';
        include 'header.php'; 
    ?>
    <?php
        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

        $content_type = $_POST['content_type'];
        $content_title = $_POST['content_title'];
        $content_image = $_POST['content_image'];
        $content_resource = $_POST['content_resource'];
          
    ?>

        <div class="container border border-success w-100 rounded my-5 " >
            <div class="row text-center">
                <div class="col-4 w-100">
                <h1 class="text-uppercase my-5">
                    <?php
                        trigger_content_background($content_type, $content_title, $content_image, $content_resource);
                        echo "New Promotion/Announcement has been succesfully added\n";
                    ?>
                </h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <table class="table">
                    <th scope="col"> Image </th>
                    <th scope="col"> Type </th>
                    <th scope="col"> Title </th>
                    <th scope="col"> Description </th>
                    <tr>
                        <td><img src = <?php echo $content_image;?> alt= ""></td>
                        <td><?php echo $content_type;?></td>
                        <td><?php echo $content_title;?></td>
                        <td><?php echo $content_resource;?></td>
                    </tr>
                </table>
            </div>
            <div class="row text-center mb-2">
                    <div class="col-4 w-100">
                        <button type="button" class="btn btn-success">
                             <a class="text-white" href="promotioninfo.php"> Go Back </a>
                        </button>
                    </div>
            </div>
            
        </div>
        
        <?php
           mysqli_close($conn); 
           include 'footer.php';
        ?>                      
</body>
</html>