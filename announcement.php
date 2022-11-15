<?php
    session_start();
    include 'api/upload2imgur.php'; 
    include_once $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php';
    $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
    
    $command = "SELECT content_title, content_image, content_resource FROM content_info WHERE content_id=?;";
    $stmt = $conn->prepare($command);
    $id = (int)$_GET['id'];
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row= $result->fetch_assoc();
?>
<html>
<head>
    <?php include 'page_head.php'; ?>
    <title><?php echo $row['content_title']; ?></title>
    
</head>
    <body>
        <?php include 'header.php'; ?>
        <div class="container border border-success rounded my-5 " >
        <div class="row text-center">
            <div class = "">
                <img src="<?php echo $row['content_image'] ?>" class="img-thumbnail" width="200" height="200" alt="...">
            </div>
            <div class="col-4 w-100">
                <h1 class="text-uppercase my-5"><?php echo $row['content_title'];?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-4 fs-4 w-75 my-5 ">
            <p> <?php echo $row['content_resource']; ?> </p>
            </div>
        </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>