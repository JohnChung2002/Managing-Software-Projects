<?php
    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_loggedin()) {
        http_response_code(400);
        exit;
    }

    function getDefaultOp($conn) {
        $default_op = array();
        $command = "SELECT * FROM default_store_availability;";
        $result = mysqli_query($conn, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            $default_op[$row["day_of_week"]] = $row["operating_hours"];
        }
        mysqli_free_result($result);
        return $default_op;
    }

    function getCustomOpDates($conn, $month_name) {
        $custom_op = array();
        $command = "SELECT operating_date, operating_hours FROM custom_store_availability WHERE MONTHNAME(operating_date)=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $month_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $custom_op[$row["operating_date"]] = $row["operating_hours"];
        }
        mysqli_free_result($result);
        return $custom_op;
    }

    date_default_timezone_set("Asia/Kuala_Lumpur");
    if (!empty($_GET["date"])) {
        if (validate_date($_GET["date"])) {
            $date = $_GET["date"];
            $conn = start_connection();

            $default_op = getDefaultOp($conn);
            $custom_op = getCustomOpDates($conn, date("F", strtotime($date)));

            $year_month = date("Y-m", strtotime($date));
            $start_day = (int)date("d", strtotime($date));
            $total_day = (int)date("t", strtotime($date));
            
            $disabled_dates = array();
            for ($x=$start_day; $x <= $total_day; $x++) {
                $date = $year_month . "-" . str_pad(strval($x),2,"0",STR_PAD_LEFT);
                if (array_key_exists($date, $custom_op)) {
                    if (is_null($custom_op[$date])) {
                        array_push($disabled_dates, $date);
                    }
                } else {
                    if (is_null($default_op[date("l", strtotime($date))])) {
                        array_push($disabled_dates, $date);
                    }
                }
            }
            mysqli_close($conn);
            echo json_encode($disabled_dates);
            exit;
        }
    }
    http_response_code(400);
    exit;
?>