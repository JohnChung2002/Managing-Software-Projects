<?php
    include '../input_validation.php';
    include 'authentication-module.php';
    include 'send_email.php';
    require_once '../database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED

    $name = $userInputPassword = $email = $gender = $phone = "";
    
    $nameMsgBool = NameValidation();
    $emailMsgBool = EmailValidation();
    $passwordMsgBool = PasswordValidation();
    $genderMsgBool = GenderValidation();
    $hashBoolValidation = HashValidation();
    $phoneMsgBool = PhoneValidation();

    // Input Validation
    if($nameMsgBool['is_valid']){
        $name = $nameMsgBool['name'];
    }else{
        echo $nameMsgBool['errMsg'];
    }
    
    if($emailMsgBool['is_valid']){
        $email = $emailMsgBool['email'];
    }else{
        echo $emailMsgBool['errMsg'];
    }

    if($phoneMsgBool['is_valid']){
        $phone = $phoneMsgBool['phone'];
    }else{
        echo $phoneMsgBool['errMsg'];
    }

    if($passwordMsgBool['is_valid']){
        $userInputPassword = $passwordMsgBool['password'];
    }else{
        echo $passwordMsgBool['errMsg'];
    }

    if($genderMsgBool['is_valid']){
        $gender = $genderMsgBool['gender'];
    }else{
        echo $genderMsgBool['errMsg'];
    }

    if($hashBoolValidation['is_valid']){
        $hashBool = processHashPassword($userInputPassword, $hashBoolValidation['hash']);
        if($hashBool['is_integrity']){
            echo "Password integrity is successful<br/>";
            echo "Hashed password is: " . addcslashes($hashBool['hashedPassword'], '$') . "<br/>";
            $hashedPassword = $hashBool['hashedPassword'];
        }else{
            echo "Password integrity is failed, please try again.";
        }
    }else{
        $hashBool['is_integrity'] = false;
        echo "Password integrity is failed, please try again.";
    }

    // All input validation is successful.
    if($nameMsgBool['is_valid'] && $emailMsgBool['is_valid'] && $passwordMsgBool['is_valid'] && $genderMsgBool['is_valid'] && $hashBool['is_integrity'] && $phoneMsgBool['is_valid']){
        echo "<br/>All input is valid";
        sendDataToDatabase($servername, $username, $password, $database, $name, $email, $hashedPassword, $gender, $phone);
    }

    // Function to send data over to database
    function sendDataToDatabase($servername, $username, $password, $database, $name, $email, $hashedPassword, $gender, $phone){
        // Generate random 12 characters hex
        $randHex = bin2hex(random_bytes(11)); 

        // Generate token expiry
        $tokenExpiry = date("Y-m-d H:i:s", strtotime("+5 minutes")); // 5 minutes from now

        // Initialise connection to database
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check if email exists within the database
        $sql = $conn -> prepare("SELECT * FROM user_info WHERE email_address = ?;");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) > 0){
            echo "Email already exists. Please Login";
        }else{
            // Add data to USER_INFO table
            $stmt = $conn -> prepare("INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES (?,?,?,?,NULL);");
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
            sendAccountVerificationEmail($email, $randHex);
        }

        // Close connection
        mysqli_close($conn);
    }

    
?>