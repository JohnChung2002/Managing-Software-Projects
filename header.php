<?php
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
    <a class="nav-link " href="#"><p class ="fs-5 mx-3 mt-3" style="color: white;">Booking</p></a>
  </li>';
  if ($user_role == 'Admin') {
    echo '
    <li class="nav-item">
      <a class="nav-link " href="report.php">
        <p class ="fs-5 mx-3 mt-3" style="color: white;">Statistics / Reports</p>
      </a>
    </li>';
  }
}
echo '
<li class="nav-item">
  <a class="nav-link" href="#"><p class ="fs-5 mx-3 mt-3" style="color: white;">Plant Encyclopedia</p></a>
</li>';
if (!$logged_in) {
  echo '
  <li class="nav-item">
    <a class="nav-link" href="signup.php" ><p class ="fs-5 mx-3 mt-3" style="color: white;">Sign Up</p></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php" ><p class ="fs-5 mx-3 mt-3" style="color: white;">Log In</p></a>
  </li>';
} else {
  echo '
  <li class="nav-item dropdown me-5">
    <a class="nav-link dropdown-toggle mt-2 me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img
            src="https://cdn-icons-png.flaticon.com/512/64/64572.png"
            class="rounded-circle mx-3"
            height="45"
            alt="Black and White Portrait of a Man"
            loading="lazy"
        />
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">My Profile</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
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