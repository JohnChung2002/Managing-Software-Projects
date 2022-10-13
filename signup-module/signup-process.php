<?php
    include '../input_validation.php';
    include 'authentication-module.php';
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED

    $name = $userInputPassword = $email = $gender = $phone = "";
    
    $nameMsgBool = NameValidation();
    $emailMsgBool = EmailValidation();
    $passwordMsgBool = PasswordValidation();
    $genderMsgBool = GenderValidation();
    $hashBoolValidation = HashValidation();
    $phoneMsgBool = PhoneValidation();

    // Input Validation
    if($nameMsgBool[2]){
        $name = $nameMsgBool[0];
    }else{
        echo $nameMsgBool[1];
    }
    
    if($emailMsgBool[2]){
        $email = $emailMsgBool[0];
    }else{
        echo $emailMsgBool[1];
    }

    if($phoneMsgBool[2]){
        $phone = $phoneMsgBool[0];
    }else{
        echo $phoneMsgBool[1];
    }

    if($passwordMsgBool[2]){
        $userInputPassword = $passwordMsgBool[0];
    }else{
        echo $passwordMsgBool[1];
    }

    if($genderMsgBool[2]){
        $gender = $genderMsgBool[0];
    }else{
        echo $genderMsgBool[1];
    }

    if($hashBoolValidation[1]){
        $hashBool = processHashPassword($userInputPassword, $hashBoolValidation[0]);
        if($hashBool[1]){
            echo "Password integrity is successful<br/>";
            echo "Hashed password is: " . addcslashes($hashBool[0], '$') . "<br/>";
            $hashedPassword = $hashBool[0];
        }else{
            echo "Password integrity is failed, please try again.";
        }
    }else{
        $hashBool[1] = false;
        echo "Password integrity is failed, please try again.";
    }

    // All input validation is successful.
    if($nameMsgBool[2] && $emailMsgBool[2] && $passwordMsgBool[2] && $genderMsgBool[2] && $hashBool[1] && $phoneMsgBool[2]){
        echo "<br/>All input is valid";
        sendDataToDatabase($servername, $username, $password, $database, $name, $email, $hashedPassword, $gender, $phone);
    }

    // Function to send data over to database
    function sendDataToDatabase($servername, $username, $password, $database, $name, $email, $hashedPassword, $gender, $phone){
        // Generate random 12 characters hex
        $randHex = bin2hex(random_bytes(11)); 

        // Initialise connection to database
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check if email exists within the database
        $sql = "SELECT * FROM user_info WHERE email_address = '$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "Email already exists. Please Login";
        }else{
            // Add data to USER_INFO table
            $command = "INSERT INTO user_info (email_address, phone_number, name, gender, preference) VALUES ('$email', '$phone', '$name', '$gender', NULL);";
            mysqli_query($conn, $command);

            // Add data to USER_CREDENTIALS table
            $command = "SELECT user_id FROM user_info WHERE email_address = '$email';";
            $userID = mysqli_fetch_assoc(mysqli_query($conn, $command))['user_id'];
            $command = "INSERT INTO user_credentials (email_address, password, user_id, user_role, account_status, account_token, token_expiry) VALUES ('$email', '$hashedPassword', '$userID', 'User', 'Unactivated', '$randHex', '2022-10-12 22:01:12');";
            mysqli_query($conn, $command);

            // Send email to user with the token for verification
            sendEmail($email, $randHex);
        }

        // Close connection
        mysqli_close($conn);
    }

    // Function to send email to the user
    function sendEmail($email, $token){
        $callurl = curl_init();
        // CHANGE THE API_LINK WHEN DEPLOYING
        $api_link = "https://script.google.com/macros/s/AKfycbwSkpuzRGDcTSZgLV7rbYcvnCsbEmVkIWq0HgbtBRhtcgfCgg8YRyfvyau91SHv2AE/exec";
        $param = "?key=EB3914D9F167D9A414DF438C7D4CD&email={$email}&subject=Verify%20Your%20Account&name=Cacti%20Succulent&token={$token}";
        $url = $api_link . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>100,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }
?>