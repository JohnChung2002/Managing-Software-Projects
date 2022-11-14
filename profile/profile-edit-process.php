<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    include $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/auth/input_validation.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/auth/authentication-module.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/auth/send_email.php';
    require_once $_SERVER['DOCUMENT_ROOT']."/Managing-Software-Projects/database_credentials.php";

    // Set the session for message
    if(!isset($_SESSION)) { 
        session_start(); 
    }
    
    $nameMsgBool = NameValidation();
    $emailMsgBool = EmailValidation();
    $passwordMsgBool = PasswordValidation();
    $genderMsgBool = GenderValidation();
    $hashBoolValidation = HashValidation();
    $phoneMsgBool = PhoneValidation();
    $preferenceMsgBool = PreferenceValidation();
    $msg = $preferenceMsgBool['errMsg'];

    // Update name
    if($nameMsgBool['is_valid']){
        $name = $nameMsgBool['name'];
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        $sql = "UPDATE user_info SET name = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $name, $_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();
    }
    
    // Update email
    if($emailMsgBool['is_valid'] && $emailMsgBool['email'] != $_SESSION['email']){
        $email = $emailMsgBool['email'];
        sendAccountVerificationEmail($_SESSION['email'], $email);
        $_SESSION['editMsg'] = "<div class='alert alert-success'>
                Verification email sent to the new email, please click on the verification link to activate the email.
            </div>";
    }

    // Update phone
    if($phoneMsgBool['is_valid']){
        $phone = $phoneMsgBool['phone'];
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        $sql = "UPDATE user_info SET phone_number = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $phone, $_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();
    }

    // Update password
    if($passwordMsgBool['is_valid']){
        $userInputPassword = $passwordMsgBool['password'];
    }else if(!empty($passwordMsgBool['password'])){
        $msg = $passwordMsgBool['errMsg'];
        $_SESSION['editMsg'] = "<div class='alert alert-danger'>
                    $msg
                </div>";
    }

    if($hashBoolValidation['is_valid'] && $passwordMsgBool['is_valid'] && !empty($_POST['password'])){
        $hashBool = processHashPassword($userInputPassword, $hashBoolValidation['hash']);
        if($hashBool['is_integrity']){
            $hashedPassword = $hashBool['hashedPassword'];
            $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
            $sql = "SELECT password FROM user_credentials WHERE user_id = $_SESSION[user_id] LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $oldpassword = $row['password'];
            mysqli_free_result($result);
            mysqli_close($conn);

            if(password_verify($_POST['oldpassword'], $oldpassword)){
                $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
                $sql = "UPDATE user_credentials SET password = ? WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $hashedPassword, $_SESSION['user_id']);
                $stmt->execute();
                $stmt->close();
                $_SESSION['editMsg'] = "<div class='alert alert-success'>
                    Password updated.
                </div>";
            }else{
                $_SESSION['editMsg'] = "<div class='alert alert-danger'>
                    Current password is incorrect.
                </div>";
            }
        }
    }else{
        $hashBool['is_integrity'] = false;
    }

    // Update preference
    if($preferenceMsgBool['is_valid']){
        $preference = $preferenceMsgBool['preference'];
        $array = explode(", ", $preference);
        $data = '[';
        $count = 0;
        foreach($array as $n){
            $count += 1;
            if($count < count($array)){
                $data .= '"'.$n.'", ';
            }else{
                $data .= '"'.$n.'"]';
            }
        }
        echo $data;
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        $sql = "UPDATE user_info SET preference = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $data, $_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();
    }

    // Upload picture to imgur if user upload a new picture
    $client_id = "180713470d0aee0";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_FILES["image"]["name"])){
            $_SESSION['editMsg'] = "<div class='alert alert-success'>
                Profile updated.
            </div>";
            $imgurBool = uploadImgur($_FILES['image'], $client_id);
            if($imgurBool['is_valid']){
                $imgurLink = $imgurBool['imgurLink'];
                
                $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
                $sql = "UPDATE user_credentials SET profile_image = ? WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $imgurLink, $_SESSION['user_id']);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
    
    function uploadImgur($file, $client_id){
        $imgurLink = "";
        $bool = false;
        $url = 'https://api.imgur.com/3/image';
        $headers = array("Authorization: Client-ID $client_id");
        $postfields = array('image' => base64_encode(file_get_contents($file['tmp_name'])));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        if($response->success){
            $imgurLink = substr_replace($response->data->link,"b",-4,0);
            $bool = true;
        }
        return array("imgurLink"=>$imgurLink, "is_valid"=>$bool);
    }
?>