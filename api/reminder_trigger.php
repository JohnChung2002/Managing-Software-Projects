<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/api_credentials.php';
    require_once dirname(__FILE__)."/api_functions.php";

    function booking_email_reminder_trigger() {
        $conn = start_connection();
        $command = 'SELECT t.booking_id, t.appointment_date, t.appointment_timeslot, t.pax, u.email_address FROM (SELECT booking_id, user_id, appointment_date, appointment_timeslot, TIMESTAMPDIFF(MINUTE,TIMESTAMP("2022-11-03 13:35:00"),TIMESTAMP(CONCAT(appointment_date, " ", appointment_timeslot))) AS time_diff, number_of_attendees AS pax FROM booking_info WHERE booking_status="Confirmed") as t JOIN user_info u ON t.user_id=u.user_id WHERE t.time_diff >= 25 AND t.time_diff <= 35;';
        if ($result = mysqli_query($conn, $command)) {
            while ($row = mysqli_fetch_assoc($result)) {
                trigger_email_api($row['email_address'], $row['booking_id'], $row['appointment_date'], $row['appointment_timeslot'], $row['pax']);
            }
        }   
    }

    function trigger_email_api($email, $id, $date, $time, $pax) {
        $callurl = curl_init();
        $param = "?key={$GLOBALS['api_key']}&email={$email}&action=reminder&id={$id}&date={$date}&time={$time}&pax={$pax}";
        $url = $GLOBALS['api_link'] . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }

    function booking_push_reminder_trigger() {
        
    }

    if (!empty($_GET["key"])) {
        if ($_GET["key"] == $GLOBALS["api_key"]) {
            booking_email_reminder_trigger();
            booking_push_reminder_trigger();
            exit();
        }
    }
    http_response_code(403);
    exit();
?>