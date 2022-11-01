<?php
require_once "./lib/zapcallib.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/api/api_functions.php';

function create_booking_ics($booking_id) {
	$conn = start_connection();
	$command = "SELECT CONCAT(appointment_date, ' ', appointment_timeslot) AS start, CONCAT(appointment_date, ' ', DATE_ADD(appointment_timeslot, INTERVAL 1 HOUR)) AS end, number_of_attendees AS pax, booking_status, edit_count FROM booking_info WHERE booking_id = ?";
	$stmt = mysqli_prepare($conn, $command);
	mysqli_stmt_bind_param($stmt, "s", $booking_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		mysqli_close($conn);
		$icalobj = new ZCiCal();
		$eventobj = new ZCiCalNode("VEVENT", $icalobj->curnode);
		$title = ZCiCal::formatContent("Cacti Succulent Booking #" . $booking_id . " for " . $row['pax'] . " pax");
		$eventobj->addNode(new ZCiCalDataNode("SUMMARY:" . $title));
		$eventobj->addNode(new ZCiCalDataNode("DTSTART:" . ZCiCal::fromSqlDateTime($row['start'])));
		$eventobj->addNode(new ZCiCalDataNode("DTEND:" . ZCiCal::fromSqlDateTime($row['end'])));
		$eventobj->addNode(new ZCiCalDataNode("SEQUENCE:" . $row['edit_count']));
		$uid = ZCiCal::formatContent($booking_id . "@cactisucculentkuching.cf");
		$eventobj->addNode(new ZCiCalDataNode("UID:" . $uid));
		$eventobj->addNode(new ZCiCalDataNode("ORGANIZER:" . ZCiCal::formatContent("cactisucculentkuching@gmail.com")));
		$eventobj->addNode(new ZCiCalDataNode("LOCATION:" . ZCiCal::formatContent("Cacti Succulent Kuching")));
		$eventobj->addNode(new ZCiCalDataNode("DTSTAMP:" . ZCiCal::fromSqlDateTime()));
		$eventobj->addNode(new ZCiCalDataNode("Description:" . ZCiCal::formatContent("Terms and Conditions:\n1. You are only allowed to update/cancel your booking 30 minutes before the appointment. Cancellation/Updates within 30 minutes of booking is not allowed.\n2. Kindly present your booking email / booking number upon arrival.\n\nVisit https://cactisucculentkuching.cf for more information.")));
		$eventobj->addNode(new ZCiCalDataNode("STATUS:". ZCiCal::formatContent(strtoupper($row['booking_status']))));
		//file_put_contents($booking_id . ".ics", $icalobj->export());
		echo $icalobj->export();
	} else {
		mysqli_free_result($result);
		mysqli_close($conn);
		http_response_code(400);
		return;
	}
	
}

if (!empty($_GET["booking_id"])) {
	header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=-osk3rEY4Tc.ics');
	//create_booking_ics("-osk3rEY4Tc", "2022-11-14 13:00:00", "2022-11-14 14:00:00", 2, 0);
	create_booking_ics($_GET["booking_id"]);
	exit;
}
http_response_code(400);
exit;
?>