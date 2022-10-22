<?php
    require_once dirname(__FILE__)."/api_functions.php";

    function loadYearMonth($month_name, $year) {
        $statistics = array();
        $conn = start_connection();
        $command = "SELECT appointment_date, COUNT(booking_id) AS number_of_bookings FROM booking_info WHERE MONTHNAME(appointment_date)=? AND YEAR(appointment_date)=? AND booking_status='Confirmed' GROUP BY (appointment_date);";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "si", $month_name, $year);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $statistics[$row["appointment_date"]] = (int)$row["number_of_bookings"];
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
    }
    http_response_code(400);
    exit;
?>