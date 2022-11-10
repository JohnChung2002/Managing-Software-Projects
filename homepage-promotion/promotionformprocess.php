<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../page_head.php'; ?>
    <title>Cacti Succulent Kuching</title>
</head>
<body id = 'version_id'>
    <?php 
        include '../database_credentials.php'; 
    ?>
    <?php
        include 'imgurupload.php';
        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        
        $content_type = $_POST['content_type'];
        $content_title = $_POST['content_title'];
        $content_image = $_POST['content_image'];
        $content_resource = $_POST['content_resource'];

        $sql = "INSERT INTO content_info (content_type, content_title, content_image, content_resource)
            VALUES ('$content_type', '$content_title', '$content_image', '$content_resource')";
          
          if (mysqli_query($conn, $sql)) {
              echo "New Promotion/Announcement has been succesfully added\n";
              } 
          else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        
    ?>

        <div class = "content">
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

        <button type="button" class="btn btn-success ms-4">
            <a href="../addpromotion.php" class = "text-white" > Go Back </a>
        </button>
    
</body>
</html>