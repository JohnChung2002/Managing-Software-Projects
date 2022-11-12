<?php
    # include 'auth/is_admin.php';
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../page_head.php'; ?>
        <script src="https://cdn.tiny.cloud/1/pa1myav7w2ag023kos2mm4meskw8zg8lnk8o6wjescoiofe4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <title>Cacti Succulent Kuching</title>
        
    </head>
    if(isset($_POST['update']))
    {
        
          $content_id = $_POST['content_id'];
          $content_type = $_POST['content_type'];
          $content_title = $_POST['content_title'];
          $content_resource = $_POST['content_resource'];
          $content_image = $_POST['content_image'];
                  
          // mysql query to Update data
          $query = "UPDATE `content_info` SET `content_type'='".$content_type."',`content_title`='".$content_resource."',`content_resource`='".$content_title."' , `content_image `= $content_image  WHERE `content_id` = $content_id";
          
          $result = mysqli_query($conn, $query);
          
          if($result)
          {
              echo 'Data Updated';
          }else{
              echo 'Data Not Updated';
          }
          mysqli_close($conn);     
    }
    <body>
        <?php 
            include '../header.php';
            include 'contentedit.php';
            include 'getcontent.php';
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
            if(isset($_POST)>0) {
                mysqli_query($conn,"UPDATE content_info set content_id=" . $_POST['content_id'] . "', content_type='" . $_POST['content_title'] . "', content_resource='" . $_POST['content_resource'] . "', content_image='" . $_POST['content_image'] . "' WHERE content_id='" . $_POST['content_id'] . "'");
                $message = "Record Modified Successfully";
            }
            
              $result = mysqli_query($conn,"SELECT * FROM content_info WHERE content_id='" . $_GET['content_id'] . "'");
              $row= mysqli_fetch_array($result);
        ?>


        <form class ="p-4 vh-100" method="post" id="promotion_form" action = "" enctype="multipart/form-data" >
            <div class="col-md-6">
                <h3>Please Upload to Imgur before continuing</h3>
                <label class = "mb-2"> Image for Content </label>
                <input type="file" name="image" id = "image" class="form-control">
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
                <input type="title" class="form-control" name = "content_title" id="content_title">
            </div>
            <div class="col-md-6">
                <label for="content_resource" class="form-label">Description</label>
                <input type="text" class="form-control" name = "content_resource" id="content_resource">
            </div>
            <div class="col-md-6">
                <?php if(!empty($imgurData)){ ?>
                    <img src="<?php echo $imgurData->data->link; ?>" class="img-thumbnail" width="200" height="200" alt="...">
                    <input type="text" class="form-control" name = "content_image" id="content_image" value = "<?php echo $imgurData->data->link; ?>">
                <?php } ?>
            </div>
            <div class="pt-4">
                <button type="submit" value="Submit" class="btn btn-success">Submit</button>
            </div>
        </form>

    

        <?php 
        include '../footer.php'; 
        ?>
    </body>
</html>