<?php
        require_once 'database_credentials.php';
        include 'send_email.php';
        include 'input_validation.php';
        include 'signup-module/authentication-module.php';
        
        // Set the session for message
        session_start();

        $passwordMsgBool = PasswordValidation();
        $hashBoolValidation = HashValidation();

        if(isset($_GET['token'])&&!empty($_GET['token'])){
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
                $emptyVal = " ";
                if(date("Y-m-d H:i:s") < date($tokenExpiry)){
                    if($passwordMsgBool['is_valid']){
                        if($hashBoolValidation['is_valid']){
                            $hashBool = processHashPassword($passwordMsgBool['password'], $hashBoolValidation['hash']);
                            if($hashBool['is_integrity']){
                                $hashedPassword = $hashBool['hashedPassword'];
                            }
                        }else{
                            $hashBool['is_integrity'] = false;
                        }
                        if($hashBool['is_integrity']){
                                $sql = $conn -> prepare("UPDATE user_credentials SET password = ?, token_expiry = ?, account_token = ?, account_status = 'Activated' WHERE email_address = ?;");
                                $sql->bind_param('ssss', $hashedPassword, $emptyVal, $emptyVal, $email);
                                $sql->execute();
                                $_SESSION['rstpassMsg'] = "
                                <div class='alert alert-success'>
                                    Password has been reset successfully. Please <a href='login-page.php'>login</a> to continue.
                                </div>";
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
        }else{
            $_SESSION['rstpassMsg'] = "
                        <div class='alert alert-danger'>
                            Invalid request.
                        </div>
                        ";
        }
    ?>