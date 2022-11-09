<?php
    require_once dirname(__FILE__)."/api_functions.php";

    if (!is_loggedin()) {
        http_response_code(400);
        exit;
    }

    $conn = start_connection();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM notification_history WHERE user_id = ? ORDER BY notification_id DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $notifications = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        echo "<li><a class='dropdown-item' href='{$row['notification_link']}'>{$row['notification_title']}</a></li>";
        }
    } else {
        echo "<li><a class='dropdown-item' href='#'>No notifications</a></li>";
    }
    echo '<li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="notifications.php">View All Notification</a></li>';
?>