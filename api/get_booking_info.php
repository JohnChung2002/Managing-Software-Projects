<?php
    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_admin()) {
        http_response_code(400);
        exit;
    }

    function getBookingInfo($conn, $booking_id) {
        $command = "SELECT appointment_date, appointment_timeslot, number_of_attendees FROM booking_info WHERE booking_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $booking_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            return $row;
        }
        return array();
    }

    if (!empty($_GET["booking_id"])) {
        $booking_id = $_GET["booking_id"];
        $conn = start_connection();
        $user_info = getBookingInfo($conn, $booking_id);
        if (!empty($user_info)) {
            mysqli_close($conn);
            echo json_encode($user_info);
            exit;
        }
    }
    http_response_code(400);
    exit;
?>