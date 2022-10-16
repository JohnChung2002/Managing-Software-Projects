<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }
    
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

    function start_connection() {
        require_once "../database_credentials.php";
        $conn = mysqli_connect($servername, $username, $password, $database);
        if ($conn) return $conn;
        http_response_code(500);
        exit;
    }
?>