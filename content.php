<?php
 include 'api/api_functions.php';
 if (isset($_GET['id'])) {
    $conn = start_connection();
    $sql = "SELECT * FROM content_info WHERE content_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $info = $result->fetch_assoc();
    }
    if ($info == false) {
        header("Location: index.php");
        exit;
    }
 } else {
    header("Location: index.php");
    exit;
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
        <h1 class="text-center mt-5">Promotion/Announcement Info</h1>
        <div id="content-info" class="col-12">
            <p>
            Promotion/Announcement ID: <?php echo $_GET['id']; ?><br>
            Type: <?php echo $info['content_type']; ?><br>
            Title: <?php echo $info['content_title']; ?><br>
            Image Link: <?php echo $info['content_image']; ?><br>
            Content: <?php echo $info['content_resource']; ?>
            </p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
