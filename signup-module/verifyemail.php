<?php
    require_once '../database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
    include 'send_email.php';

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
                echo "Your email has been verified successfully.";
                $stmt->close();
            }else{
                echo "Your token has expired. Please check your email again.";
                // Generate random 12 characters hex
                $randHex = bin2hex(random_bytes(11));
                // Generate token expiry
                $tokenExpiry = date("Y-m-d H:i:s", strtotime("+5 minutes")); // 5 minutes from now
                $stmt = $conn -> prepare("UPDATE user_credentials SET account_token = ?, token_expiry = ? WHERE email_address = ?");
                $stmt->bind_param('sss', $randHex, $tokenExpiry, $email);
                $stmt->execute();
                sendAccountVerificationEmail($email, $randHex);
            }
        }else{
            echo "Invalid token.";
        }
    }else{
        echo "Invalid request.";
    }
?>