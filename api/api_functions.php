<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }
    
    require_once $_SERVER['DOCUMENT_ROOT']."/database_credentials.php";

    date_default_timezone_set("Asia/Kuala_Lumpur");
    function validate_date($date) {
        return date_create_from_format("Y-m-d", $date) !== false;
    }

    function validate_dayname($date) {
        return date_create_from_format("l", $date) !== false;
    }

    function validate_monthname($month_name) {
        return date_create_from_format("F", $month_name) !== false;
    }

    function validate_year($year) {
        return date_create_from_format("Y", $year) !== false;
    }

    function validate_time($time) {
        return date_create_from_format("H:i:s", $time) !== false;
    }

    function generateBookingID() {
        $bytes = random_bytes(8);
        $base64 = base64_encode($bytes);
        return rtrim(strtr($base64, '+/', '-_'), '=');
    }

    function checkAppointmentAdvanceHour($date, $time) {
        $now = date("Y-m-d H:i:s");
        $input_date = date("Y-m-d H:i:s", strtotime($date . " " . $time));
        $hourdiff = round((strtotime($input_date) - strtotime($now))/3600, 1);
        return ($hourdiff > 2);
    }

    function start_connection() {
        $conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);
        if ($conn) return $conn;
        http_response_code(500);
        exit;
    }

    function is_loggedin() {
        session_start();
        return (isset($_SESSION["is_login"]) && $_SESSION["is_login"]);
    }

    function is_admin() {
        if (is_loggedin()) {
            return (isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "Admin");
        }
        else {
            return false;
        }
    }

    function get_protocol() {
        return isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO']."://" : ((isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) ? 'https://' : 'http://');
    }
?>