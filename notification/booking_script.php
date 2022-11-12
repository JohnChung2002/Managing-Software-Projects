<?php
$val = getopt("i:a:t:k:");
if ($val !== false) {
    set_time_limit(0);
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $_SERVER['DOCUMENT_ROOT'] = strstr(dirname(__FILE__), '\\notification', true);
    } else {
        $_SERVER['DOCUMENT_ROOT'] = strstr(dirname(__FILE__), '/notification', true);
    }
    include 'notification_functions.php';    
    if ($val["k"] == $GLOBALS['api_key']) {
        $title = $val["t"];
        $booking_id = $val["i"];
        $action = $val["a"];
        $ids = retrive_booking_info_for_email_notification($action, $booking_id);
        foreach ($ids as $id) {
            update_notification_data($id, $title, "[$booking_id] $title", "https://cactisucculentkuching.cf/booking.php?booking_id=$booking_id");
        }
        retrive_booking_info_for_push_notification($action, $booking_id);
    }
}
http_response_code(403);
exit;
?>