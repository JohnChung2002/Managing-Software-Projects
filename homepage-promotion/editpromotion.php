<?php
    include_once '../database_credentials.php';
    $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

    if(count($_POST)>0) {
        mysqli_query($conn,"UPDATE content_info set content_id='" . $_POST['content_id'] . "', content_type='" . $_POST['content_title'] . "', content_resource='" . $_POST['content_resource'] . "', content_image='" . $_POST['content_image'] . "' WHERE content_id='" . $_POST['content_id'] . "'");
        $message = "Record Modified Successfully";
    }
    $result = mysqli_query($conn,"SELECT * FROM content_info WHERE content_id='" . $_GET['content_id'] . "'");
    $row= mysqli_fetch_array($result);
?>
<html>
<head>
    <?php include '../page_head.php'; ?>
    <title>Update Content</title>
    
</head>
    <body>
        <form name="frmUser" method="post" action="promotionformprocess.php">
            <div><?php if(isset($message)) { echo $message; } ?>
            </div>
            <div style="padding-bottom:5px;">
                <a href="../editpromotion.php">Content List</a>
            </div>
            <div class="col-md-4">
                <label for="content_type" class="form-label">Choose Type</label>
                <select name = "content_type" id="content_type" class="form-select">
                    <option value = "Announcement">Announcement</option>
                    <option value = "Promotion">Promotion</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="content_title" class="form-label">Title</label>
                <input type="title" class="form-control" name = "content_title" id="content_title" value="<?php echo $row['content_title']; ?>" >
            </div>
            <div class="col-md-6">
                <label for="content_resource" class="form-label">Description</label>
                <input type="text" class="form-control" name = "content_resource" id="content_resource" value="<?php echo $row['content_resource']; ?>">
            </div>
            <div class="col-md-6">
                <label for="content_image" class="form-label">Image</label>
                <img src =<?php echo $row["content_image"]; ?> class="img-thumbnail" alt = "" width="200" height="200"/>
                <input type="file" class="form-control" name = "content_image" id="content_image" value="<?php echo $row['content_image']; ?>">
            </div>
            <div class="col-12">
                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </body>
</html>