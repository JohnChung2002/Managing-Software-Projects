<?php 
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<head>
    <?php include "page_head.php"; ?>    
    <!-- javascript for the calendar (date picker)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--css for the calendar (date picker)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php 
    include 'header.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/notification/notification_functions.php'; 
    echo '
    <h1 class="text-center mt-5">All Notifications</h1>
    <div class="container overflow-auto list-group my-5" style="min-height: 80vh; max-height: 80vh;">';
    load_notifications();
    echo '</div>';
    include 'footer.php'; ?>
</body>
</html>