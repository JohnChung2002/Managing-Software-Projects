<?php 
require_once '../database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('hylpYxpOlqg', '2022-11-09', '12:00:00', 6, 8, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('mPj18yElS5k', '2022-10-20', '09:00:00', 9, 7, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('9fCty64D53A', '2022-10-19', '12:00:00', 10, 7, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('8A31RgZ/mWs', '2022-10-17', '10:00:00', 14, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('RAW/GZdwl3I', '2022-10-21', '17:00:00', 15, 6, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('yRoQmHoWe5c', '2022-10-18', '11:00:00', 25, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('QKzXTCkJlLQ', '2022-11-07', '17:00:00', 26, 2, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('HeukZjkjCGE', '2022-10-17', '15:00:00', 29, 1, 'Confirmed');";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>
