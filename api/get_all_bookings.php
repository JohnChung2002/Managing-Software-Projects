<?php
    require_once "api_functions.php";

    function getAllBooking($conn, $start, $end) {
        $booking_arr = array();
        $command = "SELECT bi.booking_id, bi.appointment_date, bi.appointment_timeslot, ui.name, bi.number_of_attendees FROM booking_info bi JOIN user_info ui ON bi.user_id=ui.user_id WHERE bi.appointment_date >= ? AND bi.appointment_date <= ? AND bi.booking_status='Confirmed' ORDER BY bi.appointment_date ASC;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "ss", $start, $end);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $start_date = date_create($row["appointment_date"] . " " . $row["appointment_timeslot"], timezone_open('Asia/Kuala_Lumpur'));
            $end_date = date_create($row["appointment_date"] . " " . $row["appointment_timeslot"], timezone_open('Asia/Kuala_Lumpur'));
            date_add($end_date, date_interval_create_from_date_string("1 hour"));
            $booking = array(
                "id" => $row["booking_id"],
                "title" => "[{$row['booking_id']}] Booking for {$row['name']} ({$row['number_of_attendees']} pax)",
                "start" => date_format($start_date, "Y-m-d\TH:i:sO"),
                "end" => date_format($end_date, "Y-m-d\TH:i:sO")
            );
            array_push($booking_arr, $booking);
        }
        mysqli_free_result($result);
        return $booking_arr;
    }

    date_default_timezone_set("Asia/Kuala_Lumpur");
    if (!empty($_GET["start"]) && !empty($_GET["end"])) {
        if (validate_date($_GET["start"]) && validate_date($_GET["end"])) {
            $start = $_GET["start"];
            $end = $_GET["end"];
            $conn = start_connection();
            $booking_arr = getAllBooking($conn, $start, $end);
            mysqli_close($conn);
            echo json_encode($booking_arr);
            exit;
        }
    }
    http_response_code(400);
    exit;
?>