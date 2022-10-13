<?php
    require_once '../database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED

    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $conn = mysqli_connect($servername, $username, $password, $database);
        $sql = "SELECT * FROM user_credentials WHERE account_token = '$token' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            $update_query = "UPDATE user_credentials SET account_token = '', account_status = 'Activated', token_expiry = '' WHERE email_address = '$user[email_address]'";
            if(mysqli_query($conn, $update_query)){
                echo "Your email has been verified successfully.";
            }else{
                echo "Something went wrong. Please try again.";
            }
        }else{
            echo "Invalid token.";
        }
    }else{
        echo "Invalid request.";
    }
?>