<?php
    include 'upload2imgur.php'; 
    include_once '../database_credentials.php';
    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

    if(isset($_POST['update']))
    {
        
          $content_id = $_POST['content_id'];
          $content_type = $_POST['content_type'];
          $content_title = $_POST['content_title'];
          $content_resource = $_POST['content_resource'];
          $content_image = $_POST['content_image'];
                  
          // mysql query to Update data
          $query = "UPDATE content_info SET content_type = '$content_type' , content_title = '$content_title' ,content_resource = '$content_resource' , content_image = '$content_image'  WHERE content_id = '$content_id'";
          
          $result = mysqli_query($conn, $query);
          
          if($result)
          {
              echo 'Data Updated';
          }else{
              echo 'Data Not Updated';
          }    
    }

    $result2 = mysqli_query($conn,"SELECT * FROM content_info WHERE content_id='" . $_GET['content_id'] . "'");
    $row= mysqli_fetch_array($result2);
        
?>
<html>
<head>
    <?php include '../page_head.php'; ?>
    <title>Update Content</title>
    
</head>
    <body>
        <form class ="p-4" method="post" action="" class="form" enctype="multipart/form-data">
            <div class="col-md-6">
                <h3>Please Upload to Imgur before continuing</h3>
                <label class = "mb-2"> Image for Content </label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="pt-4">
                <input type="submit" class="btn btn-success" name="submit" value="Upload to Imgur"/>
            </div>
        </form>

        <form name="frmUser" class ="p-4 vh-100" method="post" id="promotion_form" action = "editpromotion.php?content_id=<?php echo $row["content_id"]; ?>" >
            <div>
                <?php if(isset($message)) { echo $message; } ?>
            </div>
            <div class="col-md-6">
                <a href="../promotioninfo.php">Content List</a>
            </div>
            <div class="col-md-6">
                <input type="hidden" name="content_id" id="content_id" class="txtField" value="<?php echo $row['content_id']; ?>">
                <input type="text" name="content_id" id="content_id" value="<?php echo $row['content_id']; ?>">
            </div>
            <div class="col-md-4">
                <label for="content_type" class="form-label">Choose Type</label>
                <select name = "content_type" id="content_type" class="form-select" value = "<?php echo $row['content_title']; ?>">
                    <option value = "Announcement">Announcement</option>
                    <option value = "Promotion">Promotion</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="content_title" class="form-label">Title</label>
                <input type="title" class="form-control" name = "content_title" id="content_title" value="<?php echo $row['content_title']; ?>">
            </div>
            <div class="col-md-6">
                <label for="content_resource" class="form-label">Description</label>
                <input type="text" class="form-control" name = "content_resource" id="content_resource" value="<?php echo $row['content_resource']; ?>">
            </div>
            <div class="col-md-6">
                <label for="content_image" class="form-label">Image URL</label>
                <input type="text" class="form-control" name = "content_image" id="content_image" value="<?php echo $row['content_image']; ?>">
                <?php if(!empty($imgurData)){ ?>
                    <img src="<?php echo $imgurData->data->link; ?>" class="img-thumbnail" width="200" height="200" alt="...">
                    <input type="text" class="form-control" name = "content_image" id="content_image" value = "<?php echo $imgurData->data->link; ?>">
                <?php } ?>
            </div>
            <div class="pt-4">
                <button type="submit" name = "update" value="Submit" class="btn btn-success">Submit</button>
            </div>
        </form>

        <?php
           mysqli_close($conn);  
        ?>
    </body>
</html>