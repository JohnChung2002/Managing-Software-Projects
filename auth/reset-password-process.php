<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    require_once $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php';
    include dirname(__FILE__).'/send_email.php';
    include dirname(__FILE__).'/input_validation.php';
    include dirname(__FILE__).'/authentication-module.php';
    
    // Set the session for message
    if(session_status() === PHP_SESSION_NONE) { 
        session_start(); 
    } 


    $passwordMsgBool = PasswordValidation();
    $hashBoolValidation = HashValidation();

    if(isset($_GET['token']) && !empty($_GET['token'])){
        $_SESSION['rstpassMsg'] = "
        <div class='alert alert-danger'>
            Invalid request.
        </div>
        ";
        $token = $_GET['token'];
        $conn = mysqli_connect($servername, $username, $password, $database);
        $sql = $conn -> prepare("SELECT email_address, token_expiry FROM user_credentials WHERE account_token = ? LIMIT 1;");
        $sql->bind_param('s', $token);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            $email = $user['email_address'];
            $tokenExpiry = $user['token_expiry'];
            if(date("Y-m-d H:i:s") < date($tokenExpiry)){
                if($passwordMsgBool['is_valid']){
                    if($hashBoolValidation['is_valid']){
                        $hashBool = processHashPassword($passwordMsgBool['password'], $hashBoolValidation['hash']);
                        if($hashBool['is_integrity']){
                            $hashedPassword = $hashBool['hashedPassword'];
                            $sql = $conn -> prepare("UPDATE user_credentials SET password = ?, token_expiry = NULL, account_token = NULL, account_status = 'Activated' WHERE email_address = ?;");
                            $sql->bind_param('ss', $hashedPassword, $email);
                            $sql->execute();
                            $_SESSION['rstpassMsg'] = "
                            <div class='alert alert-success'>
                                Password has been reset successfully. Please  <a href='login.php' class='link-success'><strong>login</strong></a> to continue.
                            </div>";
                        }
                    } 
                }
            }else{
                $_SESSION['rstpassMsg'] = "
                <div class='alert alert-danger'>
                    Your token has expired. Please check your email again.
                </div>
                ";
                sendResetPasswordEmail($email);
            }
        }else{
            $_SESSION['rstpassMsg'] = "
            <div class='alert alert-danger'>
                Invalid token.
            </div>
            ";
        }
    }
?>