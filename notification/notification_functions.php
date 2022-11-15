<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    require_once $_SERVER['DOCUMENT_ROOT']."/database_credentials.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/api_credentials.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/api/api_functions.php";
    require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\Messaging\CloudMessage;
    use Kreait\Firebase\Messaging\WebPushConfig;

    $icons = array(
        "booking" => "images/booking_icon.png",
        "reminder" => "images/reminder_icon.png",
        "promotion" => "images/promotion_icon.png",
        "announcement" => "images/announcement_icon.png"
    );

    function update_notification_data($id, $type, $title, $link) {
        $conn = start_connection();
        try {
            $command = "INSERT INTO notification_history (user_id, notification_type, notification_title, notification_link) VALUES (?, ?, ?, ?);";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "isss", $id, $type, $title, $link);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } catch (Exception $e) {
        }
        mysqli_close($conn);
    }

    function retrive_booking_info_for_email_notification($action, $booking_id) {
        $id_array = array();
        $conn = start_connection();
        $command = "SELECT b.appointment_date, b.appointment_timeslot, b.number_of_attendees, u.email_address, u.user_id FROM booking_info b JOIN user_info u ON b.user_id=u.user_id WHERE booking_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $booking_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) != 0) { 
            $row1 = mysqli_fetch_assoc($result);
            $user_id = $row1["user_id"];
            $user_email = $row1["email_address"];
            $appointment_date = $row1["appointment_date"];
            $appointment_timeslot = $row1["appointment_timeslot"];
            $number_of_attendees = $row1["number_of_attendees"];
            array_push($id_array, $user_id);
            trigger_booking_email($action."user", $user_email, $booking_id, $appointment_date, $appointment_timeslot, $number_of_attendees);
            mysqli_free_result($result);
            $command = "SELECT user_id, email_address FROM user_credentials WHERE user_role='Admin';";
            $result = mysqli_query($conn, $command);
            while ($row2 = mysqli_fetch_assoc($result)) {
                $admin_id = $row2["user_id"];
                array_push($id_array, $admin_id);
                $admin_email = $row2["email_address"];
                trigger_booking_email($action."admin", $admin_email, $booking_id, $appointment_date, $appointment_timeslot, $number_of_attendees);
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        return $id_array;
    }

    function trigger_booking_email($action, $email, $id, $date, $time, $pax) {
        $callurl = curl_init();
        $action = urlencode($action);
        $email = urlencode($email);
        $id = urlencode($id);
        $date = urlencode($date);
        $time = urlencode($time);
        $pax = urlencode($pax);
        $param = "?key={$GLOBALS['api_key']}&email={$email}&action={$action}&id={$id}&date={$date}&time={$time}&pax={$pax}";
        $url = $GLOBALS['api_link'] . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }

    function retrive_booking_info_for_push_notification($action, $booking_id) {
        $conn = start_connection();
        $command = "SELECT b.appointment_date, b.appointment_timeslot, b.number_of_attendees, u.notification_token FROM booking_info b JOIN user_credentials u ON b.user_id=u.user_id WHERE b.booking_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "s", $booking_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) != 0) { 
            $row1 = mysqli_fetch_assoc($result);
            $appointment_date = $row1["appointment_date"];
            $appointment_timeslot = $row1["appointment_timeslot"];
            $number_of_attendees = $row1["number_of_attendees"];
            $user_notification_token = json_decode($row1["notification_token"]);
            if (!empty($user_notification_token)) {
                trigger_booking_push_notification($action."user", $user_notification_token, $booking_id, $appointment_date, $appointment_timeslot, $number_of_attendees);
            }
            mysqli_free_result($result);
            $command = "SELECT notification_token FROM user_credentials WHERE user_role='Admin';";
            $result = mysqli_query($conn, $command);
            while ($row2 = mysqli_fetch_assoc($result)) {
                $admin_notification_token = json_decode($row2["notification_token"]);
                if (!empty($admin_notification_token)) {
                    trigger_booking_push_notification($action."admin", $admin_notification_token, $booking_id, $appointment_date, $appointment_timeslot, $number_of_attendees);
                }
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }

    function retrieve_content_info_for_email_notification($content_id) {
        $conn = start_connection();
        $command = "SELECT content_title, content_type FROM content_info WHERE content_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $content_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) != 0) { 
            $row = mysqli_fetch_assoc($result);
            $content_title = $row["content_title"];
            $content_type = $row["content_type"];
            mysqli_free_result($result);
            $command = "SELECT email_address FROM user_credentials WHERE user_role='User' AND account_status <> 'Deleted';";
            $result = mysqli_query($conn, $command);
            while ($row = mysqli_fetch_assoc($result)) {
                $user_email = $row["email_address"];
                trigger_content_email($user_email, $content_id, $content_title, $content_type);
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }

    function trigger_content_email($email, $id, $title, $type) {
        $callurl = curl_init();
        $email = urlencode($email);
        $id = urlencode($id);
        $title = urlencode($title);
        $type = urlencode($type);
        $param = "?key={$GLOBALS['api_key']}&email={$email}&action=content&id={$id}&title={$title}&type={$type}";
        $url = $GLOBALS['api_link'] . $param;
        curl_setopt_array($callurl,[CURLOPT_URL=>$url,CURLOPT_TIMEOUT_MS=>1000,CURLOPT_RETURNTRANSFER=>FALSE]);
        curl_exec($callurl);
        curl_close($callurl);
    }

    function load_user_notification_tokens($id, $title, $type) {
        $conn = start_connection();
        $command = "SELECT notification_token FROM user_credentials WHERE user_role='User' AND account_status <> 'Deleted' AND notification_token <> json_array();";
        $result = mysqli_query($conn, $command);
        while ($row = mysqli_fetch_assoc($result)) {
            $user_notification_token = json_decode($row["notification_token"]);
            if (!empty($user_notification_token)) {
                trigger_content_push_notification($user_notification_token, $id, $title, $type);
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function trigger_content_push_notification($notification_token, $id, $title, $type) {
        $path = $_SERVER['DOCUMENT_ROOT'].'/firebase.json';
        $current_url = "https://cactisucculentkuching.cf";
        $factory = (new Factory)->withServiceAccount($path);
        $messaging = $factory->createMessaging();
        $config = WebPushConfig::fromArray([
            'notification' => [
                'title' => "[$type] $title",
                'body' => "There is a new $type from Cacti Succulent Kuching."
            ],
            'fcm_options' => [
                'link' => "{$current_url}/content.php?id={$id}",
            ],
        ]);
        $message = CloudMessage::new()
            ->withWebPushConfig($config);
        $messaging->sendMulticast($message, $notification_token);
    }

    function trigger_booking_push_notification($action, $notification_token, $booking_id, $appointment_date, $appointment_timeslot, $number_of_attendees) {
        $path = $_SERVER['DOCUMENT_ROOT'].'/firebase.json';
        $current_url = get_protocol() . $_SERVER['HTTP_HOST'];  
        $factory = (new Factory)->withServiceAccount($path);
        $messaging = $factory->createMessaging();
        switch ($action) {
            case "createbookinguser":
                $config = WebPushConfig::fromArray([
                    'notification' => [
                        'title' => "[$booking_id] Booking Confirmation",
                        'body' => "Your booking for $number_of_attendees at $appointment_date $appointment_timeslot has been confirmed."
                    ],
                    'fcm_options' => [
                        'link' => "{$current_url}/booking.php?id={$booking_id}",
                    ],
                ]);
                $message = CloudMessage::new()
                    ->withWebPushConfig($config);
                $messaging->sendMulticast($message, $notification_token);
                break;
            case "createbookingadmin":
                $config = WebPushConfig::fromArray([
                    'notification' => [
                        'title' => "[$booking_id] Booking Confirmation",
                        'body' => "A new booking [$booking_id] for $number_of_attendees at $appointment_date $appointment_timeslot has been created."
                    ],
                    'fcm_options' => [
                        'link' => "{$current_url}/viewbookings.php",
                    ],
                ]);
                $message = CloudMessage::new()
                    ->withWebPushConfig($config);
                $messaging->sendMulticast($message, $notification_token);
                break;
            case "updatebookinguser":
                $config = WebPushConfig::fromArray([
                    'notification' => [
                        'title' => "[$booking_id] Booking Update",
                        'body' => "Your booking for $number_of_attendees has been updated to $appointment_date $appointment_timeslot."
                    ],
                    'fcm_options' => [
                        'link' => "{$current_url}/booking.php?id={$booking_id}",
                    ],
                ]);
                $message = CloudMessage::new()
                    ->withWebPushConfig($config);
                $messaging->sendMulticast($message, $notification_token);
                break;
            case "updatebookingadmin":
                $config = WebPushConfig::fromArray([
                    'notification' => [
                        'title' => "[$booking_id] Booking Update",
                        'body' => "The $booking_id booking for $number_of_attendees pax has been updated to $appointment_date $appointment_timeslot."
                    ],
                    'fcm_options' => [
                        'link' => "{$current_url}/viewbookings.php",
                    ],
                ]);
                $message = CloudMessage::new()
                    ->withWebPushConfig($config);
                $messaging->sendMulticast($message, $notification_token);
                break;
            case "cancelbookinguser":
                $config = WebPushConfig::fromArray([
                    'notification' => [
                        'title' => "[$booking_id] Booking Cancellation",
                        'body' => "Your booking for $number_of_attendees pax at $appointment_date $appointment_timeslot has been cancelled."
                    ],
                    'fcm_options' => [
                        'link' => "{$current_url}/booking.php?id={$booking_id}",
                    ],
                ]);
                $message = CloudMessage::new()
                    ->withWebPushConfig($config);
                $messaging->sendMulticast($message, $notification_token);
                break;
            case "cancelbookingadmin":
                $config = WebPushConfig::fromArray([
                    'notification' => [
                        'title' => "[$booking_id] Booking Cancellation",
                        'body' => "The $booking_id booking for $number_of_attendees pax at $appointment_date $appointment_timeslot has been cancelled."
                    ],
                    'fcm_options' => [
                        'link' => "{$current_url}/viewbookings.php",
                    ],
                ]);
                $message = CloudMessage::new()
                    ->withWebPushConfig($config);
                $messaging->sendMulticast($message, $notification_token);
                break;
            default:
                break;
        }
    }

    function calculate_date_diff($now, $date) {
        $interval = date_diff($now, $date);
        if ($interval->y != 0) {
            return $interval->format("%y year(s) ago");
        } else if ($interval->m != 0) {
            return $interval->format("%m month(s) ago");
        } else if ($interval->d != 0) {
            return $interval->format("%d day(s) ago");
        } else if ($interval->h != 0) {
            return $interval->format("%h hour(s) ago");
        } else if ($interval->i != 0) {
            return $interval->format("%i minute(s) ago");
        } else if ($interval->s != 0) {
            return $interval->format("%s second(s) ago");
        } else {
            return "Just now";
        }
    }

    function load_notifications() {
        $now = date_create();
        $conn = start_connection();
        $command = "SELECT notification_timestamp, notification_type, notification_title, notification_link FROM notification_history WHERE user_id=? ORDER BY notification_id DESC;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $time = date_create($row["notification_timestamp"]);
                $diff = calculate_date_diff($now, $time);
                $type = $row["notification_type"];
                if (str_contains(strtolower($type), "reminder")) {
                    $img_type = "reminder";
                } else if (str_contains(strtolower($type), "booking")) {
                    $img_type = "booking";
                } else if (str_contains(strtolower($type), "promotion")) {
                    $img_type = "promotion";
                } else if (str_contains(strtolower($type), "announcement")) {
                    $img_type = "announcement";
                }
                $title = $row["notification_title"];
                $link = $row["notification_link"];

                echo "
                <div class='row my-2' onclick='window.location.href=\"$link\"'>
                    <div class='col-2 d-flex flex-wrap align-items-center'>
                        <img src='{$GLOBALS['icons'][$img_type]}' style='display:block; margin-left:auto; margin-right:auto; height:60px;'/>
                    </div>
                    <div class='col d-flex flex-wrap align-items-center'>
                        <div class='d-flex w-100 justify-content-between'>
                            <h5 class='mb-1'>$title</h5>
                            <small>$diff</small>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<h5>No notifications to display.</h5>";
        }
    }

    function trigger_content_background($type, $title, $image, $content) {
        $conn = start_connection();
        $command = "INSERT INTO content_info (content_type, content_title, content_image, content_resource) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, 'ssss', $type, $title, $image, $content);
        mysqli_stmt_execute($stmt);
        $content_id = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        $command = "SELECT user_id FROM user_credentials ORDER BY user_id DESC LIMIT 1;"; 
        $result = mysqli_query($conn, $command);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        mysqli_free_result($result);
        $user_id = escapeshellarg($user_id);
        $content_id = escapeshellarg($content_id);
        $type = escapeshellarg($type);
        $title = escapeshellarg($title);
        $key = escapeshellarg($GLOBALS['api_key']);
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            pclose(popen("START /MIN php \"notification\\content_script.php\" -i$user_id -s$title -t$type -c$content_id -k$key", "r"));
        } else {
            pclose(popen("php \"notification/content_script.php\" -i$user_id -s$title -t$type -c$content_id -k$key >/dev/null 2>/dev/null &", "r"));
        }
        mysqli_close($conn);
    }
?>