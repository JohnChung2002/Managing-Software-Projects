<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Managing-Software-Projects/database_credentials.php";

    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
    $sql = "SELECT token_expiry FROM user_credentials WHERE account_status = 'Pending Delete'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $tokenExpiry = $row['token_expiry'];
            if(date("Y-m-d H:i:s") > date($tokenExpiry)){
                $sql = "UPDATE user_credentials SET account_status = 'Deleted', token_expiry = NULL WHERE account_status = 'Pending Delete'";
                mysqli_query($conn, $sql);
            }
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>