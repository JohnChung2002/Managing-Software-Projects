<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Verification</title>
    <?php include 'page_head.php'; ?>
</head>
<body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php';
    include 'auth/send_email.php';

    if(isset($_GET['token']) && isset($_GET['email'])) {
        $token = $_GET['token'];
        $newEmail = $_GET['email'];
        $conn = mysqli_connect($servername, $username, $password, $database);
        $sql = $conn -> prepare("SELECT email_address, token_expiry FROM user_credentials WHERE account_token = ? LIMIT 1;");
        $sql->bind_param('s', $token);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            $tokenExpiry = $user['token_expiry'];
            $email = $user['email_address'];

            if(date("Y-m-d H:i:s") < date($tokenExpiry)){
                $stmt = $conn -> prepare("UPDATE user_credentials SET email_address = ?, account_token = NULL, account_status = 'Activated', token_expiry = NULL WHERE account_token = ?");
                $stmt->bind_param('ss', $newEmail, $token);
                $stmt->execute();

                $stmt = $conn -> prepare("UPDATE user_info SET email_address = ? WHERE email_address = ?");
                $stmt->bind_param('ss', $newEmail, $email);
                $stmt->execute();
                $message = "
                    <div class='alert alert-success'>
                        Account verified successfully. Please <a href='login.php' class='link-success'><strong>login</strong></a> to continue.
                    </div>
                    ";
                $stmt->close();
            }else{
                $message = "
                <div class='alert alert-danger'>
                    Your token has expired. Please check your email again.
                </div>
                ";
                sendAccountVerificationEmail($email, $newEmail);
            }
        } else {
            $message = "
                <div class='alert alert-danger'>
                    Invalid token.
                </div>
                ";
        }
    }else{
        $message = "
                <div class='alert alert-danger'>
                    Invalid request.
                </div>
                ";
    }
    ?>
    <?php include 'header.php'; ?>
    <div class="container p-3 vh-100">
        <?php echo $message; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>