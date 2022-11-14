<?php
    include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php"; ?>
    <title>Cancelling Appointment</title>
</head>
<body>
  <?php include 'header.php'; 
  include "booking/enquiry_functions.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        answerenquiry();
    }
    else{
    echo"
    <h1 class='text-center mt-5'>REPLY ENQUIRY</h1>
    <div class='container p-5 my-5 border'>
        <p>You are now replying to the current enquiry:</p>
        ";
        $id = (int)$_GET['id'];
        getEnquiryInformation($id);
         echo"
        <form method='post' class='row g-3 needs-validation' novalidate>
        <div class='col-md-6'>
        <br/>
        <h6><label for='inputReason' class='form-label'>Response to the enquiry :</label></h6>
        <input type='text' class='form-control' id='inputReason' name='inputReason' required>
        <div class='valid-feedback'>Looks good!</div>
        <div class='invalid-feedback'>Please enter a response.  </div>
        </div>
        <div class='col-12'>
            <button type='submit' class='btn btn-primary'>Response Now</button>
            <button type='reset' class='btn btn-primary'>Reset</button>
        </div>
        </form>
        <script src='script/booking_validation.js'></script>
    </div>";
    };
   include 'footer.php';?>
</body>
</html>