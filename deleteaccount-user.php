<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Verification</title>
    <?php include 'page_head.php'; ?>
</head>
<body>
    <?php
    if(session_status() === PHP_SESSION_NONE) { 
        session_start(); 
    }
    require_once 'database_credentials.php';
    include $_SERVER['DOCUMENT_ROOT'].'/auth/send_email.php';

    sendDeleteAccountEmail($_SESSION['email']);
    $message = "
    <div class='alert alert-danger'>
        Account will be deleted in 24 hours.
    </div>
    ";
        
    ?>
    <script>alert("Confirm Deletion.");</script>
    <?php include 'header.php'; ?>
    <div class="container p-3 vh-100">
        <?php echo $message; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>