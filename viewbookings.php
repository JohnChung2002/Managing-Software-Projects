<?php
    include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "page_head.php"; ?>
    <title>View Bookings</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js" integrity="sha256-7PzqE1MyWa/IV5vZumk1CVO6OQbaJE4ns7vmxuUP/7g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" integrity="sha256-5veQuRbWaECuYxwap/IOE/DAwNxgm4ikX7nrgsqYp88=" crossorigin="anonymous">
    <script src="script/calendar.js"></script>
    <style>
        .fc-timegrid-slots tr {
            height: 8vh !important;
        }
        .fc-event-time, .fc-event-title {
            padding: 0 1px;
            white-space: normal;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container my-2">
        <h1 class="text-center">Calendar Bookings View</h1>
        <div id='calendar'></div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>