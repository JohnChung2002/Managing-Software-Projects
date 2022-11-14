<?php
    include 'auth/is_admin.php';
    include 'api/api_functions.php';
    include 'notification/notification_functions.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        trigger_content_background($_POST['content-type'], $_POST['content-title'], $_POST['content-image'], $_POST['content-resource']);
        echo "success";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Booking</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container min-vh-100">
        <h1 class="text-center mt-5">Promotion</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="content-type">Content Type</label>
                <select class="form-control" id="content-type" name="content-type">
                    <option value="promotion">Promotion</option>
                    <option value="announcement">Announcement</option>
                </select>
            </div>
            <div class="form-group">
                <label for="content-title">Content Title</label>
                <input type="text" class="form-control" id="content-title" name="content-title" placeholder="Enter content title" required>
            </div>
            <div class="form-group">
                <label for="content-image">Content Image</label>
                <input type="text" class="form-control" id="content-image" name="content-image" placeholder="Enter content image link" required>
            </div>
            <div class="form-group">
                <label for="content-resource">Content Resource</label>
                <input type="text" class="form-control" id="content-resource" name="content-resource" placeholder="Enter content info" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
