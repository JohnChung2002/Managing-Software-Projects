<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    require_once "database_credentials.php";

    // Function to send email to the user for verification
    function sendAccountVerificationEmail($email){
        
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
        $api_link = "https://script.google.com/macros/s/AKfycbwSkpuzRGDcTSZgLV7rbYcvnCsbEmVkIWq0HgbtBRhtcgfCgg8YRyfvyau91SHv2AE/exec";
        $param = "?key=EB3914D9F167D9A414DF438C7D4CD&email={$email}&subject=Verify%20Your%20Account&name=Cacti%20Succulent&token={$token}";
        $url = $api_link . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>100,CURLOPT_RETURNTRANSFER=>FALSE]);
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
        $api_link = "https://script.google.com/macros/s/AKfycbwSkpuzRGDcTSZgLV7rbYcvnCsbEmVkIWq0HgbtBRhtcgfCgg8YRyfvyau91SHv2AE/exec";
        $param = "?key=EB3914D9F167D9A414DF438C7D4CD&email={$email}&subject=Verify%20Your%20Account&name=Cacti%20Succulent&token={$token}";
        $url = $api_link . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>100,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }
?>