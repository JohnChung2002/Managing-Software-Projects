<?php
    // Function to send email to the user for verification
    function sendAccountVerificationEmail($email, $token){
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