<?php
    require_once dirname(__FILE__)."/api_functions.php";

    function getDefaultOp($conn, $day) {
        $default_op = NULL;
        $command = "SELECT operating_hours FROM default_store_availability WHERE day_of_week=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $day);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $default_op = $row["operating_hours"];
        }
        mysqli_free_result($result);
        return $default_op;
    }

    function getCustomOp($conn, $date) {
        $custom_op = NULL;
        $command = "SELECT operating_hours FROM custom_store_availability WHERE operating_date=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $date);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $custom_op = $row["operating_hours"];
        }
        mysqli_free_result($result);
        return $custom_op;
    }

    function getSlots($conn, $date) {
        $taken_slots = array();
        $command = "SELECT appointment_timeslot FROM booking_info WHERE appointment_date=? AND booking_status='Confirmed';";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $date);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($taken_slots, $row["appointment_timeslot"]);
        }
        mysqli_free_result($result);
        return $taken_slots;
    }

    function checkAdvanceHour($date, $time) {
        $now = date("Y-m-d H:i:s");
        $input_date = date("Y-m-d H:i:s", strtotime($date . " " . $time));
        $hourdiff = round((strtotime($input_date) - strtotime($now))/3600, 1);
        return ($hourdiff > 2);
    }

    function populateSlots($date, $op_array, $taken_slots) {
        $available_slots = array();
        $op_array = json_decode($op_array);
        foreach ($op_array as $available) {
            list($start, $end) = explode("-", $available);
            $begin = (int)explode(":", $start, 2)[0];
            $finish = (int)explode(":", $end, 2)[0];
            for ($i = $begin; $i < $finish; $i++) {
                $time = $i . ":00:00";
                if (checkAdvanceHour($date, $time)) {
                    if (in_array($time, $taken_slots)) {
                        if (array_count_values($taken_slots)[$time] < 2) {
                            array_push($available_slots, $time);
                        }
                    } else {
                        array_push($available_slots, $time);
                    }
                }
            }
        }
        return $available_slots;
    }

    date_default_timezone_set("Asia/Kuala_Lumpur");
    if (!empty($_GET["date"])) {
        if (validate_date($_GET["date"])) {
            $date = $_GET["date"];
            $conn = start_connection();
            $default_op = getDefaultOp($conn, date("l", strtotime($date)));
            $custom_op = getCustomOp($conn, $date);
            $taken_slots = getSlots($conn, $date);
            $available_slots = array();
            if ($custom_op) {
                $available_slots = populateSlots($date, $custom_op, $taken_slots);
                echo json_encode($available_slots);
                exit;
            } else {
                if ($default_op != NULL) {
                    $available_slots = populateSlots($date, $default_op, $taken_slots);
                    echo json_encode($available_slots);
                    exit;
                }
            }
        }
    }
    http_response_code(400);
    exit;
?>