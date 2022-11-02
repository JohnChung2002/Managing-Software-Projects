<?php 

if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/api/api_functions.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

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
            $time = str_pad($i, 2, "0", STR_PAD_LEFT) . ":00:00";
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

function checkClash($conn, $date, $slot) {
    $default_op = getDefaultOp($conn, date("l", strtotime($date)));
    $custom_op = getCustomOp($conn, $date);
    $taken_slots = getSlots($conn, $date);
    $available_slots = array();
    if ($custom_op) {
        $available_slots = populateSlots($date, $custom_op, $taken_slots);
    } else {
        if ($default_op != NULL) {
            $available_slots = populateSlots($date, $default_op, $taken_slots);
        }
    }
    return in_array($slot, $available_slots);
}

function checkUserRedirect() {
    if (!empty($_GET["id"])) {
        $conn = start_connection();
        $user_id = $_SESSION["user_id"];
        $booking_id = $_GET["id"];
        $command = "SELECT * FROM booking_info WHERE booking_id=? AND user_id=? AND booking_status='Confirmed';";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "ss", $booking_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            mysqli_close($conn);
            return true;
        }
        mysqli_close($conn);        
    }
    return false;
}

function createUserBooking() {
    if (!empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["inputPpl"]) && isset($_SESSION["user_id"])) {
        if (validate_date($_POST["date"]) && validate_time($_POST["time"])) {
            $date = $_POST["date"];
            $time = $_POST["time"];
            $user_id = $_SESSION["user_id"];
            $number_of_attendees = (int)$_POST["inputPpl"];
            $conn = start_connection();
            if (checkClash($conn, $date, $time)) {
                while (True) {
                    $booking_id = generateBookingID();
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
                            <div class='container'>
                                <div class='alert alert-success mt-4'>
                                Booking created successfully! Please check your email or booking page for more details.
                                </div>
                            </div>";
                            mysqli_close($conn);
                            return true;
                        }
                    }
                    mysqli_free_result($result);
                }
            }
            mysqli_close($conn);
        }
    }
    echo "
    <div class='container'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>"; 
    return false;
}

function createUserInfo($conn, $name, $email, $phone, $gender) {
    $command = "INSERT INTO user_info (name, email_address, phone_number, gender) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_prepare($conn, $command);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $gender);
    mysqli_stmt_execute($stmt);
}

function checkUserExists($conn, $email) {
    $command = "SELECT * FROM user_info WHERE email_address=?;";
    $stmt = mysqli_prepare($conn, $command);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        mysqli_free_result($result);
        return true;
    }
    mysqli_free_result($result);
    return false;
}

function adminCreateBooking() {
    if (!empty($_POST["name"]) && !empty($_POST["gender"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["inputPpl"])) {
        if (validate_date($_POST["date"]) && validate_time($_POST["time"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];
            $date = $_POST["date"];
            $time = $_POST["time"];
            $number_of_attendees = (int)$_POST["inputPpl"];
            $conn = start_connection();
            if (checkClash($conn, $date, $time)) {
                if (!checkUserExists($conn, $email)) {
                    createUserInfo($conn, $name, $email, $phone, $gender);
                }
                while (True) {
                    $booking_id = generateBookingID();
                    $command = "SELECT * FROM booking_info WHERE booking_id=?;";
                    $stmt = mysqli_prepare($conn, $command);
                    mysqli_stmt_bind_param($stmt, "s", $booking_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (mysqli_num_rows($result) == 0) {
                        mysqli_free_result($result);
                        $command = "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES (?, ?, ?, (SELECT user_id FROM user_info WHERE email_address=?), ?, 'Confirmed');";
                        $stmt = mysqli_prepare($conn, $command);
                        mysqli_stmt_bind_param($stmt, "ssssi", $booking_id, $date, $time, $email, $number_of_attendees);
                        if (mysqli_stmt_execute($stmt)) {
                            echo "
                            <div class='container'>
                                <div class='alert alert-success mt-4'>
                                Booking created successfully! Please check your email or booking page for more details.
                                </div>
                            </div>";
                            mysqli_close($conn);
                            return true;
                        }
                    }
                    mysqli_free_result($result);
                }
            }
            mysqli_close($conn);
        }
    }
    echo "
    <div class='container'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>"; 
    return false;
}

function newenquiry(){
    if (!empty($_POST["name"]) && !empty($_POST["gender"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["inputPpl"])) {

}

function getBookingInformation($booking_id) {
    $conn = start_connection();
    $user_id = $_SESSION["user_id"];
    $command = "SELECT appointment_date, appointment_timeslot, number_of_attendees FROM booking_info WHERE user_id=? AND booking_id=?;";
    $stmt = mysqli_prepare($conn, $command);
    mysqli_stmt_bind_param($stmt, "ss", $user_id, $booking_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    echo "
    <p>Booking ID: " . $booking_id . 
    "<br/>
    Booking Date: " . $row["appointment_date"] .
    "<br/>
    Booking Time: " . $row["appointment_timeslot"] .
    "<br/>
    Number of Attendees: " . $row["number_of_attendees"] .
    "</p>";
}

function updateUserBooking() {
    if (!empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["inputPpl"]) && !empty($_GET["id"]) && isset($_SESSION["user_id"])) {
        if (validate_date($_POST["date"]) && validate_time($_POST["time"])) {
            $date = $_POST["date"];
            $time = $_POST["time"];
            $user_id = $_SESSION["user_id"];
            $booking_id = $_GET["id"];
            $number_of_attendees = (int)$_POST["inputPpl"];
            $conn = start_connection();
            $command = "SELECT * FROM booking_info WHERE booking_id=? AND user_id=? AND booking_status='Confirmed';";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "ss", $booking_id, $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                mysqli_free_result($result);
                if (checkClash($conn, $date, $time)) {
                    $command = "UPDATE booking_info SET appointment_date=?, appointment_timeslot=?, number_of_attendees=? WHERE booking_id=? AND user_id=?;";
                    $stmt = mysqli_prepare($conn, $command);
                    mysqli_stmt_bind_param($stmt, "ssiss", $date, $time, $number_of_attendees, $booking_id, $user_id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "
                        <div class='container min-vh-100'>
                            <div class='alert alert-success mt-4'>
                            Booking updated successfully! Please check your email or booking page for more details.
                            </div>
                        </div>";
                        mysqli_close($conn);
                        return true;
                    }
                }
            } else {
                mysqli_free_result($result);
            }
            mysqli_close($conn);
        }
    }
    echo "
    <div class='container min-vh-100'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";
    return false;
}

function adminUpdateBooking() {
    if (!empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["inputPpl"]) && !empty($_POST["booking-id"])) {
        if (validate_date($_POST["date"]) && validate_time($_POST["time"])) {
            $date = $_POST["date"];
            $time = $_POST["time"];
            $booking_id = $_POST["booking-id"];
            $number_of_attendees = (int)$_POST["inputPpl"];
            $conn = start_connection();
            $command = "SELECT * FROM booking_info WHERE booking_id=? AND booking_status='Confirmed';";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "s", $booking_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                mysqli_free_result($result);
                if (checkClash($conn, $date, $time)) {
                    $command = "UPDATE booking_info SET appointment_date=?, appointment_timeslot=?, number_of_attendees=? WHERE booking_id=?;";
                    $stmt = mysqli_prepare($conn, $command);
                    mysqli_stmt_bind_param($stmt, "ssis", $date, $time, $number_of_attendees, $booking_id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "
                        <div class='container'>
                            <div class='alert alert-success mt-4'>
                            Booking updated successfully! Please check your email or booking page for more details.
                            </div>
                        </div>";
                        mysqli_close($conn);
                        return true;
                    }
                }
            }
            mysqli_close($conn);
        }
    }
    echo "
    <div class='container'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";
    return false;
}

function cancelUserBooking() {
    if (isset($_SESSION["user_id"]) && !empty($_GET["id"]) && !empty($_POST["inputReason"])) {
        $user_id = $_SESSION["user_id"];
        $booking_id = $_GET["id"];
        $reason = $_POST["inputReason"];
        $conn = start_connection();
        $command = "SELECT appointment_date, appointment_timeslot FROM booking_info WHERE booking_id=? AND user_id=? AND booking_status='Confirmed';";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "ss", $booking_id, $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if (checkAdvanceHour($row["appointment_date"], $row["appointment_timeslot"])) {
            $command = "UPDATE booking_info SET booking_status='Cancelled', cancellation_remarks=? WHERE booking_id=? AND user_id=?;";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "sss", $reason, $booking_id, $user_id);
            if (mysqli_stmt_execute($stmt)) {
                echo "
                <div class='container min-vh-100'>
                    <div class='alert alert-success mt-4'>
                    Booking cancelled successfully! Please check your email or booking page for more details.
                    </div>
                </div>";
                mysqli_close($conn);
                return true;
            }
        }
        mysqli_close($conn);
    }
    echo "
    <div class='container min-vh-100'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";
    return false;
}

function adminCancelBooking() {
    if (!empty($_POST["booking-id"]) && !empty($_POST["inputReason"])) {
        $booking_id = $_POST["booking-id"];
        $reason = $_POST["inputReason"];
        $conn = start_connection();
        $command = "SELECT appointment_date, appointment_timeslot FROM booking_info WHERE booking_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $booking_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if (checkAdvanceHour($row["appointment_date"], $row["appointment_timeslot"])) {
            $command = "UPDATE booking_info SET booking_status='Cancelled', cancellation_remarks=? WHERE booking_id=?;";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "ss", $reason, $booking_id);
            if (mysqli_stmt_execute($stmt)) {
                echo "
                <div class='container'>
                    <div class='alert alert-success mt-4'>
                    Booking cancelled successfully! Please check your email or booking page for more details.
                    </div>
                </div>";
                mysqli_close($conn);
                return true;
            }
        }
        mysqli_close($conn);
    }
    echo "
    <div class='container'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";
    return false;
}

function getUserBooking() {
    $conn = start_connection();
    $user_id = $_SESSION["user_id"];
    $command = "SELECT booking_id, appointment_date, appointment_timeslot, number_of_attendees, booking_status FROM booking_info WHERE user_id=? ORDER BY appointment_date DESC;";
    $stmt = mysqli_prepare($conn, $command);
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $date = date_create_from_format("Y-m-d H:i:s", $row["appointment_date"] . " " . $row["appointment_timeslot"]);
            date_modify($date, "-2 hour");
            echo "
            <div class='col-md-4'>
                <div class='card mb-4 shadow-sm'>
                <div class='card-body'>
                    <p class='card-text'>
                    Booking for " . $row["number_of_attendees"] . " pax
                    <br/>
                    Date: ". $row["appointment_date"] . "
                    <br/>
                    Time: " . $row["appointment_timeslot"] . "
                    <br/>
                    Status: " . $row["booking_status"] . "
                    </p>";
            if ($row["booking_status"] == "Confirmed" && $date > date_create()) {
                echo "
                <div class='d-flex justify-content-between align-items-center'>
                    <div class='btn-group'>
                        <button type='button' class='btn btn-primary' onclick='window.location.href=\"updatebooking.php?id=". $row["booking_id"] ."\"'>Update Booking</button>
                        <button type='button' class='btn btn-danger' onclick='window.location.href=\"cancelbooking.php?id=". $row["booking_id"] ."\"'>Cancel Booking</button>
                    </div>
                </div>";
            }   
            echo "</div>
                </div>
            </div>";
        }
    } else {
        echo "
        <div class='container min-vh-100'>
            <div class='alert alert-info'>
            You have no bookings.
            </div>
        </div>";
    }
}

function updateAvailability() {
    $valid = false;
    if(!empty($_POST["date"]) && !empty($_POST["custom-option"])) {
        if (validate_date($_POST["date"])) {
            if ($_POST["custom-option"] == "closed") {
                $conn = start_connection();
                $command = "INSERT INTO custom_store_availability (operating_date) VALUES(?) ON DUPLICATE KEY UPDATE operating_hours=NULL;";
                $stmt = mysqli_prepare($conn, $command);
                mysqli_stmt_bind_param($stmt, "s", $_POST["date"]);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_close($conn);
                    $valid = true;
                }
            } else if ($_POST["custom-option"] == "open-with-no-breaks") {
                if (!empty($_POST["opening"]) && !empty($_POST["closing"])) {
                    if (validate_time($_POST["opening"]) && validate_time($_POST["closing"])) {
                        $timerange =  $_POST["opening"] . "-" . $_POST["closing"];
                        $conn = start_connection();
                        $command = "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES(?, JSON_ARRAY(?)) ON DUPLICATE KEY UPDATE operating_hours=JSON_ARRAY(?);";
                        $stmt = mysqli_prepare($conn, $command);
                        mysqli_stmt_bind_param($stmt, "sss", $_POST["date"], $timerange, $timerange);
                        if (mysqli_stmt_execute($stmt)) {
                            mysqli_close($conn);
                            $valid = true;
                        }
                    }
                }
            } else if ($_POST["custom-option"] == "open-with-one-break") {
                if (!empty($_POST["opening-1"]) && !empty($_POST["closing-1"]) && !empty($_POST["opening-2"]) && !empty($_POST["closing-2"])) {
                    if (validate_time($_POST["opening-1"]) && validate_time($_POST["closing-1"]) && validate_time($_POST["opening-2"]) && validate_time($_POST["closing-2"])) {
                        $conn = start_connection();
                        $timerange1 = $_POST["opening-1"] . "-" . $_POST["closing-1"];
                        $timerange2 = $_POST["opening-2"] . "-" . $_POST["closing-2"];
                        $command = "INSERT INTO custom_store_availability (operating_date, operating_hours) VALUES(?, JSON_ARRAY(?, ?)) ON DUPLICATE KEY UPDATE operating_hours=JSON_ARRAY(?, ?);";
                        $stmt = mysqli_prepare($conn, $command);
                        mysqli_stmt_bind_param($stmt, "sssss", $_POST["date"], $timerange1, $timerange2, $timerange1, $timerange2);
                        if (mysqli_stmt_execute($stmt)) {
                            mysqli_close($conn);
                            $valid = true;
                        }
                    }
                }
            }
        }
    }
    if ($valid) {
        echo "
        <div class='container'>
            <div class='alert alert-success mt-4'>
            Availability updated successfully!
            </div>
        </div>";
    } else {
        echo "
        <div class='container'>
            <div class='alert alert-danger mt-4'>
            Invalid request!
            </div>
        </div>";
    }
}
?>