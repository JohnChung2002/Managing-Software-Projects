<?php 
require_once '../database_credentials.php'; 
$conn = mysqli_connect($servername, $username, $password, $database);
$command = "";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('POVS4WT2JeY', '2022-11-21', '11:00:00', 6, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('pyFUQSxoM/Y', '2022-11-23', '09:00:00', 6, 6, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('+x5RE52ELD4', '2022-12-01', '16:00:00', 6, 6, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('IYIGXk5IbJE', '2022-11-14', '09:00:00', 6, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('pmQPsAg68mI', '2022-12-07', '16:00:00', 6, 2, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('mxtVWteme1g', '2022-11-08', '11:00:00', 6, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('lZBsAokv9BU', '2022-11-30', '09:00:00', 6, 8, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('sUXA7AmK5FM', '2022-11-14', '09:00:00', 9, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('N9O1ydd7GrY', '2022-11-30', '09:00:00', 9, 8, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('Ld7lMaJNfSU', '2022-12-12', '09:00:00', 9, 1, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('CA1AReETyGg', '2022-12-02', '13:00:00', 9, 8, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('FurpW5D59xg', '2022-11-23', '14:00:00', 9, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('HtIpzOMUEvY', '2022-10-20', '09:00:00', 9, 2, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('EFhR5HEADkc', '2022-12-08', '09:00:00', 9, 3, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('wv9XtJfUmdY', '2022-10-31', '10:00:00', 10, 4, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('i+OM/rOQrnk', '2022-11-04', '14:00:00', 10, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('Ytz4Qsil27Q', '2022-10-24', '10:00:00', 10, 5, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('YVUS1wCSbj8', '2022-11-11', '15:00:00', 10, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('/zutZFvmauw', '2022-10-24', '09:00:00', 10, 8, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('tzY59yplLz0', '2022-11-03', '09:00:00', 10, 6, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('FWdu5GnSLUw', '2022-12-05', '09:00:00', 14, 1, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('KPlPdOOzH4g', '2022-12-08', '14:00:00', 14, 6, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('mxMu3SfHR7U', '2022-12-13', '14:00:00', 14, 7, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('8WSTlnQCoEg', '2022-11-07', '13:00:00', 14, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('bed897y5Gaw', '2022-12-07', '09:00:00', 14, 4, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('1Cz2xq6cZ6I', '2022-10-31', '13:00:00', 14, 6, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('7xzIrD6Nuwc', '2022-11-10', '14:00:00', 14, 2, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('Ud7B+uH879k', '2022-10-24', '13:00:00', 14, 8, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('iBrfCKXmWyg', '2022-11-10', '15:00:00', 14, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('mWNx+7rq2OM', '2022-11-24', '14:00:00', 14, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('OUAVpUZmITA', '2022-10-24', '15:00:00', 15, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('5tbAya0hbBI', '2022-12-08', '14:00:00', 15, 8, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('qa4lpuhC5vs', '2022-10-28', '16:00:00', 15, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('G0az1Dft++o', '2022-11-11', '14:00:00', 21, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('AQZKvWr2qGw', '2022-12-09', '15:00:00', 21, 1, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('+osk3rEY4Tc', '2022-11-14', '13:00:00', 21, 1, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('urDsJ6RPx+w', '2022-11-07', '09:00:00', 22, 7, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('80Q00b1icZ4', '2022-11-17', '09:00:00', 22, 1, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('GvgsBiqkriA', '2022-10-19', '09:00:00', 22, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('ljgaGSZu1nk', '2022-11-07', '13:00:00', 22, 6, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('0wKwaNVWU3E', '2022-11-02', '10:00:00', 22, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('NzyFoAaxKt4', '2022-12-12', '15:00:00', 22, 6, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('QiJPMtMA02U', '2022-12-05', '16:00:00', 22, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('ePmuEA+BzYE', '2022-11-11', '13:00:00', 22, 3, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('FuxU9g953lU', '2022-10-19', '12:00:00', 22, 6, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('j0J12iAzaho', '2022-11-09', '12:00:00', 23, 7, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('qul34ocnH74', '2022-10-25', '10:00:00', 23, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('gm34eBSHbro', '2022-12-12', '13:00:00', 23, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('biGPa9FCkuY', '2022-12-12', '13:00:00', 23, 3, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('q+iaXZEgOw0', '2022-11-25', '16:00:00', 23, 1, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('mNRn+QzHUKI', '2022-10-31', '11:00:00', 24, 8, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('HjzgQ9P5iDc', '2022-10-28', '15:00:00', 24, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('5FIftn84VjI', '2022-11-18', '09:00:00', 24, 5, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('pohzJq0Qm4o', '2022-11-08', '15:00:00', 24, 2, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('sYt7E6NR9xc', '2022-12-09', '11:00:00', 24, 4, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('xNX0uXnEAi4', '2022-10-31', '13:00:00', 24, 2, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('roxWTWJ9axE', '2022-11-14', '13:00:00', 25, 5, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('qlcUIbd8+oA', '2022-10-17', '10:00:00', 25, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('2F4FJx2ENYA', '2022-10-19', '12:00:00', 25, 5, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('jtZNr7esz5I', '2022-11-08', '14:00:00', 26, 8, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('Id7L8gQuDoU', '2022-11-22', '09:00:00', 26, 8, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('VoukUBxmrqE', '2022-11-15', '16:00:00', 26, 6, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('xpuCFTVNUPc', '2022-10-25', '10:00:00', 26, 5, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('K+Z2iBZEOb8', '2022-12-07', '13:00:00', 27, 1, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('f55Hg9/zYJY', '2022-12-12', '09:00:00', 27, 6, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('4BPDO45fn4Q', '2022-10-28', '09:00:00', 27, 8, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('J52sTien8iU', '2022-10-17', '11:00:00', 28, 2, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('ztCSuFLwGWg', '2022-10-31', '13:00:00', 28, 6, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('e7nm1TpqiSI', '2022-11-01', '16:00:00', 28, 4, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('vQTXRv6e/mo', '2022-10-17', '10:00:00', 28, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('z1XiSled9Io', '2022-12-07', '15:00:00', 28, 3, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('SWdbNTWdFbc', '2022-11-16', '09:00:00', 28, 4, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('YytA9/9n2SM', '2022-10-20', '10:00:00', 29, 6, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('e3brWLRrTmY', '2022-11-21', '14:00:00', 29, 3, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('WEVlPEYSCUU', '2022-11-04', '13:00:00', 29, 2, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('Zk6lFtjNtDM', '2022-11-25', '13:00:00', 29, 5, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('qwyFE1dCw/g', '2022-11-28', '09:00:00', 29, 8, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('XCmZ87X3yGg', '2022-11-28', '11:00:00', 29, 7, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('w3vzSR4j6ns', '2022-10-27', '09:00:00', 29, 2, 'Confirmed');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('OwVYWGiLomQ', '2022-11-24', '11:00:00', 30, 2, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('oLMCG0NIWH4', '2022-11-15', '09:00:00', 30, 2, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('x4l4xZcXzeM', '2022-11-10', '16:00:00', 30, 4, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('PsYVE0yjb9Q', '2022-11-17', '16:00:00', 30, 5, 'Cancelled');";
$command .= "INSERT INTO booking_info (booking_id, appointment_date, appointment_timeslot, user_id, number_of_attendees, booking_status) VALUES ('o8g5Atff4wQ', '2022-10-28', '09:00:00', 30, 3, 'Cancelled');";
mysqli_multi_query($conn, $command); 
mysqli_close($conn);
?>