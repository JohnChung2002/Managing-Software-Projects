<?php

    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_admin()) {
        http_response_code(400);
        exit;
    }
    
    function getPageResource($conn, $version_id) {
        $command = "SELECT page_resource, remarks FROM homepage_info WHERE email_address=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $version_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            return $row;
        }
        return array();
    }

    if (!empty($_GET["version_id"])) {
        $booking_id = $_GET["version_id"];
        $conn = start_connection();
        $user_info = getBookingInfo($conn, $version_id);
        if (!empty($homepage_info)) {
            mysqli_close($conn);
            echo json_encode($homepage_info);
            exit;
        }
    }
    http_response_code(400);
    exit;
    

       
?>