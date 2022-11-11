<?php
    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_loggedin()) {
        http_response_code(400);
        exit;
    }

    if (!empty($_GET["token"])) {
        $user_id = $_SESSION['user_id'];
        $conn = start_connection();
        $command = "SELECT JSON_SEARCH(notification_token, 'one', ?) as position FROM user_credentials WHERE user_id = ?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "si", $_GET["token"], $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row["position"] === NULL) {
            mysqli_stmt_close($stmt);
            mysqli_free_result($result);
            $command = "UPDATE user_credentials SET notification_token = JSON_ARRAY_APPEND(notification_token, '$', ?) WHERE user_id=?;";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "si", $_GET["token"], $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            echo true;
            return;
        }
        echo false;
        return;
    }
    http_response_code(400);
    exit;
?>