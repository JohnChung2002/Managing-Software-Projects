<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Email Verification</title>
        <?php include 'header.php'; ?>
        <?php include 'page_head.php'; ?>
    </head>
    <?php
        require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
        include 'auth/send_email.php';

        if(isset($_GET['token'])){
            $token = $_GET['token'];
            $conn = mysqli_connect($servername, $username, $password, $database);
            $sql = $conn -> prepare("SELECT * FROM user_credentials WHERE account_token = ? LIMIT 1;");
            $sql->bind_param('s', $token);
            $sql->execute();
            $result = $sql->get_result();
            if(mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                $email = $user['email_address'];
                $tokenExpiry = $user['token_expiry'];
                $status = 'Activated';
                $emptyVal = " ";

                if(date("Y-m-d H:i:s") < date($tokenExpiry)){
                    $stmt = $conn -> prepare("UPDATE user_credentials SET account_token = ?, account_status = ?, token_expiry = ? WHERE email_address = ?");
                    $stmt->bind_param('ssss', $emptyVal, $status, $emptyVal, $email);
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
                    sendAccountVerificationEmail($email);
                }
            }else{
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
    <body>
        <div class="container p-3 vh-100">
            <?php echo $message; ?>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>