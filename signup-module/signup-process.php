<?php
    include 'input_validation.php';
    include 'authentication-module.php';
    include 'send_email.php';
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED

    $name = $userInputPassword = $email = $gender = $phone = "";
    $nameMsgBool = $emailMsgBool = $passwordMsgBool = $genderMsgBool = $phoneMsgBool = "";

    // Set the session for message
    session_start();
    
    $nameMsgBool = NameValidation();
    $emailMsgBool = EmailValidation();
    $passwordMsgBool = PasswordValidation();
    $genderMsgBool = GenderValidation();
    $hashBoolValidation = HashValidation();
    $phoneMsgBool = PhoneValidation();

    // Input Validation
    if($nameMsgBool['is_valid']){
        $name = $nameMsgBool['name'];
    }
    
    if($emailMsgBool['is_valid']){
        $email = $emailMsgBool['email'];
    }

    if($phoneMsgBool['is_valid']){
        $phone = $phoneMsgBool['phone'];
    }

    if($passwordMsgBool['is_valid']){
        $userInputPassword = $passwordMsgBool['password'];
    }

    if($genderMsgBool['is_valid']){
        $gender = $genderMsgBool['gender'];
    }

    if($hashBoolValidation['is_valid']){
        $hashBool = processHashPassword($userInputPassword, $hashBoolValidation['hash']);
        if($hashBool['is_integrity']){
            $hashedPassword = $hashBool['hashedPassword'];
        }
    }else{
        $hashBool['is_integrity'] = false;
    }

    // All input validation is successful.
    if($nameMsgBool['is_valid'] && $emailMsgBool['is_valid'] && $passwordMsgBool['is_valid'] && $genderMsgBool['is_valid'] && $hashBool['is_integrity'] && $phoneMsgBool['is_valid']){
        sendDataToDatabase($servername, $username, $password, $database, $name, $email, $hashedPassword, $gender, $phone);
    }

    // Function to send data over to database
    function sendDataToDatabase($servername, $username, $password, $database, $name, $email, $hashedPassword, $gender, $phone){
        // Initialise connection to database
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check if email exists within the database
        $sql = $conn -> prepare("SELECT * FROM user_info WHERE email_address = ?;");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) > 0){
            $_SESSION['signupMsg'] = "
            <div class='alert alert-danger'>
                Email already exists. Please <a href='login-page.php'>login</a>.
            </div>
            ";
        }else{
            // Add data to USER_INFO table
            $stmt = $conn -> prepare("INSERT INTO user_info (email_address, phone_number, name, gender) VALUES (?,?,?,?);");
            $stmt->bind_param('siss', $email, $phone, $name, $gender);
            $stmt->execute();
            $stmt->close();
            
            // Add data to USER_CREDENTIALS table
            $sql = $conn -> prepare("SELECT user_id FROM user_info WHERE email_address = ?;");
            $sql->bind_param('s', $email);
            $sql->execute();
            $result = $sql->get_result();
            $userID = mysqli_fetch_assoc($result)['user_id'];
            
            $sql = $conn -> prepare("INSERT INTO user_credentials (email_address, password, user_id, user_role, account_status, account_token, token_expiry) VALUES (?, ?, ?, 'User', 'Unactivated', ?, ?);");
            $sql->bind_param('ssiss', $email, $hashedPassword, $userID, $randHex, $tokenExpiry);
            $sql->execute();

            // Send email to user with the token for verification
            sendAccountVerificationEmail($email);
            $_SESSION['signupMsg'] = "
            <div class='alert alert-success'>
                Account created successfully. Please check your email for verification.
            </div>
            ";
        }
        
        // Close connection
        mysqli_close($conn);
    }
?>