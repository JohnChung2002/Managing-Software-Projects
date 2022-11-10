<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Managing-Software-Projects/database_credentials.php";
    $deletedCount = 0;
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
    $sql = "SELECT token_expiry, user_id FROM user_credentials WHERE account_status = 'Pending Delete'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $tokenExpiry = $row['token_expiry'];
            if(date("Y-m-d H:i:s") > date($tokenExpiry)){
                $sql = "UPDATE user_credentials SET account_status = 'Deleted', token_expiry = NULL WHERE user_id = $user_id";
                mysqli_query($conn, $sql);
                $deletedCount+=1;
            }
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    echo "Deleted ".$deletedCount." accounts.";
?>