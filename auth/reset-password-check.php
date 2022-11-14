<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    require_once 'database_credentials.php';
    include dirname(__FILE__).'/send_email.php';
    include dirname(__FILE__).'/input_validation.php';
    include dirname(__FILE__).'/authentication-module.php';
    
    // Set the session for message
    if(!isset($_SESSION)) { 
        session_start(); 
    } 


    $_SESSION['valid'] = false;
    $token = $_GET['token'];
    $email = $_GET['email'];
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = $conn -> prepare("SELECT * FROM user_credentials WHERE account_token = ? AND email_address = ? LIMIT 1;");
    $sql->bind_param('ss', $token, $email);
    $sql->execute();
    $result = $sql->get_result();
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $tokenExpiry = $user['token_expiry'];
        $emptyVal = " ";
        if(date("Y-m-d H:i:s") > date($tokenExpiry)){
            $_SESSION['rstpassMsg'] = "
            <div class='alert alert-danger'>
                Your token has expired. Please check your email again.
            </div>
            ";
            sendResetPasswordEmail($email);
        } else {
            $_SESSION['valid'] = true;
        }
    } else {
        $_SESSION['rstpassMsg'] = "
        <div class='alert alert-danger'>
            Invalid request.
        </div>
        ";
    }
?>