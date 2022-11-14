<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/api_credentials.php';
    require_once dirname(__FILE__)."/api_functions.php";
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\Messaging\CloudMessage;
    use Kreait\Firebase\Messaging\WebPushConfig;

    function booking_email_reminder_trigger() {
        $conn = start_connection();
        $command = 'SELECT t.booking_id, t.appointment_date, t.appointment_timeslot, t.pax, u.email_address, u.user_id FROM (SELECT booking_id, user_id, appointment_date, appointment_timeslot, TIMESTAMPDIFF(MINUTE,NOW(),TIMESTAMP(CONCAT(appointment_date, " ", appointment_timeslot))) AS time_diff, number_of_attendees AS pax FROM booking_info WHERE booking_status="Confirmed") as t JOIN user_info u ON t.user_id=u.user_id WHERE t.time_diff >= 25 AND t.time_diff <= 35;';
        if ($result = mysqli_query($conn, $command)) {
            while ($row = mysqli_fetch_assoc($result)) {
                update_notification_data($row['user_id'], $row['booking_id'], "[{$row['booking_id']}] Booking Reminder", 'https://cactisucculentkuching.cf/booking/booking.php?id='.$row['booking_id']);
                trigger_email_api($row['email_address'], $row['booking_id'], $row['appointment_date'], $row['appointment_timeslot'], $row['pax']);
            }
        }   
    }

    function trigger_email_api($email, $id, $date, $time, $pax) {
        $callurl = curl_init();
        $param = "?key={$GLOBALS['api_key']}&email={$email}&action=reminder&id={$id}&date={$date}&time={$time}&pax={$pax}";
        $url = $GLOBALS['api_link'] . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }

    function booking_push_reminder_trigger() {
        $path = $_SERVER['DOCUMENT_ROOT'].'/firebase.json';
        $current_url = get_protocol() . $_SERVER['HTTP_HOST'];
        $factory = (new Factory)->withServiceAccount($path);
        $messaging = $factory->createMessaging();
        $conn = start_connection();
        $command = 'SELECT t.booking_id, t.appointment_date, t.appointment_timeslot, t.pax, u.notification_token FROM (SELECT booking_id, user_id, appointment_date, appointment_timeslot, TIMESTAMPDIFF(MINUTE,NOW(),TIMESTAMP(CONCAT(appointment_date, " ", appointment_timeslot))) AS time_diff, number_of_attendees AS pax FROM booking_info WHERE booking_status="Confirmed") as t JOIN user_credentials u ON t.user_id=u.user_id WHERE t.time_diff >= 25 AND t.time_diff <= 35;';
        if ($result = mysqli_query($conn, $command)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $notification_token = json_decode($row['notification_token']);
                if (!empty($notification_token)) {
                    $config = WebPushConfig::fromArray([
                        'notification' => [
                            'title' => "[{$row['booking_id']}] Booking Reminder",
                            'body' => 'Your booking is in 30 minutes.'
                        ],
                        'fcm_options' => [
                            'link' => "{$current_url}/booking.php?id={$row['booking_id']}",
                        ],
                    ]);
                    $message = CloudMessage::new()
                        ->withWebPushConfig($config);
                    $messaging->sendMulticast($message, $notification_token);
                }
            }
        }
    }

    if (!empty($_GET["key"])) {
        if ($_GET["key"] == $GLOBALS["api_key"]) {
            booking_email_reminder_trigger();
            booking_push_reminder_trigger();
            exit();
        }
    }
    http_response_code(403);
    exit();
?>