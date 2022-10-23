<?php
    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_admin()) {
        http_response_code(400);
        exit;
    }

    function loadYearMonth($month_name, $year) {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT appointment_timeslot, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE MONTHNAME(appointment_date)=? AND YEAR(appointment_date)=? AND booking_status='Confirmed' GROUP BY (appointment_timeslot);";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "si", $month_name, $year);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_timeslot"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    }
    
    function loadYear($year) {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT appointment_timeslot, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE YEAR(appointment_date)=? AND booking_status='Confirmed' GROUP BY (appointment_timeslot);";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $year);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_timeslot"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    }

    function loadMonth($month_name) {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT appointment_timeslot, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE MONTHNAME(appointment_date)=? AND booking_status='Confirmed' GROUP BY (appointment_timeslot);";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $month_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_timeslot"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    }

    function loadDay($day_name) {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT appointment_timeslot, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE DAYNAME(appointment_date)=? AND booking_status='Confirmed' GROUP BY (appointment_timeslot);";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $day_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_timeslot"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    } 

    function loadDate($date) {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT appointment_timeslot, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE appointment_date=? AND booking_status='Confirmed' GROUP BY (appointment_timeslot);";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $date);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_timeslot"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    }

    function loadAll() {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT appointment_timeslot, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE booking_status='Confirmed' GROUP BY (appointment_timeslot);";
        $result = mysqli_query($conn, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_timeslot"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    }

    date_default_timezone_set("Asia/Kuala_Lumpur");
    if (!empty($_GET["month_name"]) && !empty($_GET["year"])) {
        $month_name = $_GET["month_name"];
        $year = $_GET["year"];
        if (validate_monthname($month_name) && validate_year($year)) {
            echo json_encode(loadYearMonth($month_name, $year));
            exit;
        }
    } else if (!empty($_GET["year"])) {
        $year = $_GET["year"];
        if (validate_year($year)) {
            echo json_encode(loadYear($year));
            exit;
        }
    } else if (!empty($_GET["month_name"])) {
        $month_name = $_GET["month_name"];
        if (validate_monthname($month_name)) {
            echo json_encode(loadMonth($month_name));
            exit;
        }
    } else if (!empty($_GET["day_name"])) {
        $day_name = $_GET["day_name"];
        if (validate_dayname($day_name)) {
            echo json_encode(loadDay($day_name));
            exit;
        }
    } else if (!empty($_GET["date"])) {
        $date = $_GET["date"];
        if (validate_date($date)) {
            echo json_encode(loadDate($date));
            exit;
        }
    } else {
        echo json_encode(loadAll());
        exit;
    }
    http_response_code(400);
    exit;
?>