<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    require_once "database_credentials.php";

    // Function to send email to the user for verification
    function sendAccountVerificationEmail($email, $newEmail){
        
        // Initilaize the connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        // Generate random 12 characters hex
        $token = bin2hex(random_bytes(11));
        // Generate token expiry
        $tokenExpiry = date("Y-m-d H:i:s", strtotime("+5 minutes")); // 5 minutes from now
        $stmt = $conn -> prepare("UPDATE user_credentials SET account_token = ?, token_expiry = ? WHERE email_address = ?");
        $stmt->bind_param('sss', $token, $tokenExpiry, $email);
        $stmt->execute();

        $callurl = curl_init();
        // CHANGE THE API_LINK WHEN DEPLOYING
        $api_link = "https://script.google.com/macros/s/AKfycbzgo1QlFZlbK2RJ5HH1ebjynLhMZ8oP1yijO6T2lF47KN4DAwZIsps9m4dqa9cF19c/exec";
        $param = "?key=EB3914D9F167D9A414DF438C7D4CD&email={$newEmail}&action=verification&name=Cacti%20Succulent&token={$token}";
        $url = $api_link . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }

    // Function to send email to the user for password reset
    function sendResetPasswordEmail($email){
        
        // Initilaize the connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        // Generate random 12 characters hex
        $token = bin2hex(random_bytes(11));
        // Generate token expiry
        $tokenExpiry = date("Y-m-d H:i:s", strtotime("+5 minutes")); // 5 minutes from now
        $stmt = $conn -> prepare("UPDATE user_credentials SET account_token = ?, token_expiry = ?, account_status = 'Pending Reset' WHERE email_address = ?");
        $stmt->bind_param('sss', $token, $tokenExpiry, $email);
        $stmt->execute();

        $callurl = curl_init();
        // CHANGE THE API_LINK WHEN DEPLOYING
        $api_link = "https://script.google.com/macros/s/AKfycbzgo1QlFZlbK2RJ5HH1ebjynLhMZ8oP1yijO6T2lF47KN4DAwZIsps9m4dqa9cF19c/exec";
        $param = "?key=EB3914D9F167D9A414DF438C7D4CD&email={$email}&action=reset&name=Cacti%20Succulent&token={$token}";
        $url = $api_link . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }

    // Function to send email to confirm account deletion
    function sendDeleteAccountEmail($email){
        // Initilaize the connection
        $token= "";
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        // Generate token expiry
        $tokenExpiry = date("Y-m-d H:i:s", strtotime("+1 day")); // 1 day from now
        $stmt = $conn -> prepare("UPDATE user_credentials SET token_expiry = ?, account_status = 'Pending Delete' WHERE email_address = ?");
        $stmt->bind_param('ss', $tokenExpiry, $email);
        $stmt->execute();

        $callurl = curl_init();
        // CHANGE THE API_LINK WHEN DEPLOYING
        $api_link = "https://script.google.com/macros/s/AKfycbzgo1QlFZlbK2RJ5HH1ebjynLhMZ8oP1yijO6T2lF47KN4DAwZIsps9m4dqa9cF19c/exec";
        $param = "?key=EB3914D9F167D9A414DF438C7D4CD&email={$email}&action=reset&name=Cacti%20Succulent&token={$token}";
        $url = $api_link . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }
?>