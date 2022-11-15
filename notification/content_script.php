<?php
$val = getopt("i:s:t:c:k:");
if ($val !== false) {
    set_time_limit(0);
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $_SERVER['DOCUMENT_ROOT'] = strstr(dirname(__FILE__), '\\notification', true);
    } else {
        $_SERVER['DOCUMENT_ROOT'] = strstr(dirname(__FILE__), '/notification', true);
    }
    include 'notification_functions.php';    
    if ($val["k"] == $GLOBALS['api_key']) {
        $user_id = (int)$val["i"];
        $content_type = $val["t"];
        $content_title = $val["s"];
        $content_id = (int)$val['c'];
        $url = "https://cactisucculentkuching.cf/announcement.php?id=".$content_id;
        for ($i = 1; $i <= $val['i']; $i++) {
            update_notification_data($i, $content_type, $content_title , $url);
        }
        retrieve_content_info_for_email_notification($content_id);
        load_user_notification_tokens($content_id, $content_title, $content_type);
    }
}
http_response_code(403);
exit;
?>