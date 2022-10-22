<?php
    require_once dirname(__FILE__)."/api_functions.php";

    function getUserInfo($conn, $email) {
        $command = "SELECT name, phone_number, gender FROM user_info WHERE email_address=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            return $row;
        }
        return array();
    }

    if (!empty($_GET["email"])) {
        $email = $_GET["email"];
        $conn = start_connection();
        $user_info = getUserInfo($conn, $email);
        if (!empty($user_info)) {
            mysqli_close($conn);
            echo json_encode($user_info);
            exit;
        }
    }
    http_response_code(400);
    exit;
?>