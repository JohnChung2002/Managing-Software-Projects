<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
}
echo '
<section class="">
    <footer class="text-white text-center" style="background-color: #1AA36D;" > 
        <div class="container p-4" >
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Cacti-Succulent Kuching</h5>
                    <p>
                        We are a local company that specializes in selling only the best, high quality cacti and other planting products. Our goal is to deliver the best to the customer.
                    </p>
                </div>
                <div class="col-lg-5 col-md-0 mb-0 mb-md-0">
                    <h5 class="text-uppercase">Business Hours</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                        <p class="text-white">Weekday:	9:00 AM – 6:00 PM</p>
                        </li>
                        <li>
                        <p class="text-white">Weekend:	9:00 AM – 3:00 PM</p>
                        </li>
                        <li>
                        <p class="text-white">Public Holiday:	9:00 AM – 3:00 PM</p>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        <div class="text-center p-3" style="background-color: #1AA36D;">
        © 2022 Copyright:
        <a class="text-white" href="https://cactisucculentkuching.cf/">cactisucculentkuching.cf/</a>
        </div>
    </footer>
</section>';
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true){
    if ($_SESSION['user_role'] == "User" || $_SESSION['user_role'] == "Admin" || $_SESSION['user_role'] == "Super Admin") {
        include 'notification/script.php';
        echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Would you like enable notifications to receive push notification updates on bookings, promotions and announcements?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="rejectNotification(); $(\'#exampleModal\').modal(\'toggle\');">Close</button>
                <button type="button" class="btn btn-primary" onclick="requestPermission(); $(\'#exampleModal\').modal(\'toggle\');">Allow</button>
            </div>
            </div>
        </div>
        </div>';
    } 
}

?>