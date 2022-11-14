<?php
 include 'auth/is_loggedin.php';
 include 'booking/booking_functions.php';
 if (isset($_GET['booking_id'])) {
    $info = checkBooking($_GET['booking_id']);
    if ($info == false) {
        header("Location: login.php");
        exit;
    }
 } else {
    header("Location: login.php");
    exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Booking</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container min-vh-100">
        <h1 class="text-center mt-5">Booking Info</h1>
        <div id="booking-info" class="col-12">
            <p>
            Booking ID: <?php echo $_GET['booking_id']; ?><br>
            Booking Date: <?php echo $info['appointment_date']; ?><br>
            Booking Time: <?php echo $info['appointment_timeslot']; ?><br>
            Number of Attendees: <?php echo $info['number_of_attendees']; ?>
            </p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
