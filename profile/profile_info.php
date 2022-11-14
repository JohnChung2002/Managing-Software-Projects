<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Managing-Software-Projects/database_credentials.php";
    // Set the session for message
    if(!isset($_SESSION)) { 
        session_start(); 
    }

    if(!empty($_SESSION['user_id'])){
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        $sql = "SELECT * FROM user_info WHERE user_id = $_SESSION[user_id] LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email_address'];
        $phone = $row['phone_number'];
        $replacedStr = array('[', '"', ']');
        $preference = str_replace($replacedStr, '', $row['preference']);
        $preference = explode(',', $preference);
        mysqli_free_result($result);

        $sql = "SELECT * FROM user_credentials WHERE user_id = $_SESSION[user_id] LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $picture = $row['profile_image'];
        mysqli_free_result($result);

        mysqli_close($conn);
        if($preference[0]!=''){
            $preference = implode(",",$preference);
        } else {
            $preference = "No preference";
        }
        if(!is_null($picture)){
            $picture = $picture;
        } else {
            $picture = "https://i.imgur.com/mCHMpLTb.png";
        }

        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['preference'] = $preference;
        $_SESSION['profileImg'] = $picture;
    }
?>