<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    require_once $_SERVER['DOCUMENT_ROOT']."/database_credentials.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/api_credentials.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/api/api_functions.php";
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    function retrive_booking_info_for_notification($action, $booking_id) {
        $conn = start_connection();
        $command = "SELECT b.appointment_date, b.appointment_timeslot, b.number_of_attendees, u.email_address FROM booking_info b JOIN user_info u ON b.user_id=u.user_id WHERE booking_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $booking_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) != 0) { 
            $row1 = mysqli_fetch_assoc($result);
            $user_email = $row1["email_address"];
            $appointment_date = $row1["appointment_date"];
            $appointment_timeslot = $row1["appointment_timeslot"];
            $number_of_attendees = $row1["number_of_attendees"];
            trigger_booking_email($action."user", $user_email, $booking_id, $appointment_date, $appointment_timeslot, $number_of_attendees);
            mysqli_free_result($result);
            $command = "SELECT email_address FROM user_credentials WHERE user_role='Admin';";
            $result = mysqli_query($conn, $command);
            while ($row2 = mysqli_fetch_assoc($result)) {
                $admin_email = $row2["email_address"];
                trigger_booking_email($action."admin", $admin_email, $booking_id, $appointment_date, $appointment_timeslot, $number_of_attendees);
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }

    function trigger_booking_email($action, $email, $id, $date, $time, $pax) {
        $callurl = curl_init();
        $param = "?key={$GLOBALS['api_key']}&email={$email}&action={$action}&id={$id}&date={$date}&time={$time}&pax={$pax}";
        $url = $GLOBALS['api_link'] . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }

    function retrieve_content_info_for_notification($content_id) {
        $conn = start_connection();
        $command = "SELECT content_title, content_type FROM content_info WHERE content_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $content_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) != 0) { 
            $row = mysqli_fetch_assoc($result);
            $content_title = $row["content_title"];
            $content_type = $row["content_type"];
            mysqli_free_result($result);
            $command = "SELECT email_address FROM user_info WHERE user_role='User';";
            $result = mysqli_query($conn, $command);
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email = $row["email_address"];
                trigger_content_email($user_email, $content_id, $content_title, $content_type);
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }

    function trigger_content_email($email, $id, $title, $type) {
        $callurl = curl_init();
        $param = "?key={$GLOBALS['api_key']}&email={$email}&action=content&id={$id}&title={$title}&type={$type}";
        $url = $GLOBALS['api_link'] . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }
?>