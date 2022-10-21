<?php 

function start_connection() {
    require_once "database_credentials.php";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if ($conn) return $conn;
    http_response_code(500);
    exit;
}

function validate_date($date) {
    return date_create_from_format("Y-m-d", $date) !== false;
}

function validate_time($time) {
    return date_create_from_format("H:i:s", $time) !== false;
}

function generateBookingID() {
    $bytes = random_bytes(8);
    $base64 = base64_encode($bytes);
    return rtrim(strtr($base64, '+/', '-_'), '=');
}

function createBooking() {
    if (!empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["inputPpl"])) {
        if (validate_date($_POST["date"]) && validate_time($_POST["time"])) {
            $date = $_POST["date"];
            $time = $_POST["time"];
            $user_id = $_SESSION["user_id"];
            $number_of_attendees = (int)$_POST["inputPpl"];
            $conn = start_connection();
            $booking_id = generateBookingID($conn);
            $command = "SELECT * FROM booking_info WHERE booking_id=?;";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "s", $booking_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 0) {
                mysqli_free_result($result);
                $command = "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES (?, ?, ?, ?, ?, 'Confirmed');";
                $stmt = mysqli_prepare($conn, $command);
                mysqli_stmt_bind_param($stmt, "ssssi", $booking_id, $date, $time, $user_id, $number_of_attendees);
                if (mysqli_stmt_execute($stmt)) {
                    echo "
                    <div class='container min-vh-100'>
                        <div class='alert alert-success mt-4'>
                        Booking created successfully! Please check your email or booking page for more details.
                        </div>
                    </div>";
                    return;
                }
            }
        }
    }
    echo "
    <div class='container min-vh-100'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";   
}
?>