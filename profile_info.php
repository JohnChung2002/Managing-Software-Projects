<?php
    require_once 'database_credentials.php';

    function getProfile(){
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
            return array('name'=>$name, 'email'=>$email, 'phone'=>$phone, 'preference'=>$preference, 'profileImage'=>$picture);
        }
    }
?>