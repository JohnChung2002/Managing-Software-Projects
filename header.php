<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
  http_response_code(403);
  exit;
}

require_once $_SERVER['DOCUMENT_ROOT']."/api/api_functions.php";

function load_header_notifications() {
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
}

function load_notification_header() {
  echo '<li class="nav-item dropdown-center">
    <a class="nav-link mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img
          id="notification_icon"
          src="images/notification-read.png"
          class="rounded-circle mx-3"
          height="45"
          alt="notification_icon"
          loading="lazy"/>
    </a>
    <ul id="notification_container" class="dropdown-menu" style="left: -100% !important;">';
    load_header_notifications();
    echo '
    </ul>
  </li>';
}

$logged_in = (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true);
if ($logged_in) {
    $user_role = $_SESSION['user_role'];
}
echo '
<header>
  <nav class="navbar navbar-expand-lg" style="background-color: #1AA36D;">
    <div class="container-fluid mx-auto">
      <img src="images/cactus.png" class="me-4" height="70" alt="Cactus-Succlent Kuching Logo" loading="lazy"/>
      <a class="navbar-brand fw-bold fs-1" style ="color: white;" href="/">Cacti-Succulent Kuching</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav nav-pills nav-fill mb-4 mb-lg-0 ">';
if ($logged_in) {
  echo '
  <li class="nav-item">
    <a class="nav-link " href="dashboard.php"><p class ="fs-5 mx-3 mt-3" style="color: white;">Booking</p></a>
  </li>';
  if ($user_role == 'Admin' || $user_role == 'Super Admin') {
    echo '
    <li class="nav-item">
      <a class="nav-link " href="report.php">
        <p class ="fs-5 mx-3 mt-3" style="color: white;">Statistics / Reports</p>
      </a>
    </li>';
  }
  if ($user_role == 'Admin') {
    echo '
    <li class="nav-item">
      <a class="nav-link " href="deleteaccount-admin.php">
        <p class ="fs-5 mx-3 mt-3" style="color: white;">Delete Account</p>
      </a>
    </li>';
  }
  if ($user_role == 'Super Admin') {
    echo '
    <li class="nav-item dropdown me-5">
      <a class="nav-link me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <p class="dropdown-toggle fs-5 mx-3 mt-3" style="color: white;">Account Management</p>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="signup.php">Create Admin Account</a></li>
        <li><a class="dropdown-item" href="deleteaccount-admin.php">Delete Account</a></li>
      </ul>
    </li>';
  }
}
if ($logged_in) {
  if ($user_role == 'Admin' || $user_role == 'Super Admin') {
    echo '
    <li class="nav-item">
      <a class="nav-link" href="visitor_encyclopedia_interface.php"><p class ="fs-5 mx-3 mt-3" style="color: white;">Plant Encyclopedia</p></a>
    </li>';
  } else {
    echo '
    <li class="nav-item">
      <a class="nav-link" href="visitor_encyclopedia_interface.php"><p class ="fs-5 mx-3 mt-3" style="color: white;">Plant Encyclopedia</p></a>
    </li>';
  }
} 
if (!$logged_in) {
  echo '
  <li class="nav-item">
    <a class="nav-link" href="visitor_encyclopedia_interface.php"><p class ="fs-5 mx-3 mt-3" style="color: white;">Plant Encyclopedia</p></a>
  </li>';
}
if (!$logged_in) {
  echo '
  <li class="nav-item">
    <a class="nav-link" href="signup.php" ><p class ="fs-5 mx-3 mt-3" style="color: white;">Sign Up</p></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php" ><p class ="fs-5 mx-3 mt-3" style="color: white;">Log In</p></a>
  </li>';
} else {
  load_notification_header();
  echo '
  <li class="nav-item dropdown me-5">
    <a class="nav-link dropdown-toggle mt-2 me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img
          src="https://cdn-icons-png.flaticon.com/512/64/64572.png"
          class="rounded-circle mx-3"
          height="45"
          alt="Black and White Portrait of a Man"
          loading="lazy"/>
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="profilepage.php">My Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
    </ul>
  </li>';
}
echo '</ul>
      </div>
    </div>
</nav>
</header>';
?>