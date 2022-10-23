<?php
    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_admin()) {
        http_response_code(400);
        exit;
    }

    function loadYear($year) {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT MONTHNAME(appointment_date) AS appointment_month, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE YEAR(appointment_date)=? AND booking_status='Confirmed' GROUP BY MONTHNAME(appointment_date);";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $year);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_month"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    }

    function loadAll() {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT CONCAT(MONTHNAME(appointment_date), ' ', YEAR(appointment_date)) AS appointment_month, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE booking_status='Confirmed' GROUP BY CONCAT(MONTHNAME(appointment_date), ' ', YEAR(appointment_date));";
        $result = mysqli_query($conn, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_month"]] = (int)$row["number_of_bookings"];
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $statistics;
    }

    date_default_timezone_set("Asia/Kuala_Lumpur");
    if (!empty($_GET["year"])) {
        $year = $_GET["year"];
        if (validate_year($year)) {
            echo json_encode(loadYear($year));
            exit;
        }
    } else {
        echo json_encode(loadAll());
        exit;
    }
    http_response_code(400);
    exit;

?>