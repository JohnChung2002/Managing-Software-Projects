
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Enquiries Request</title>
    <?php include "page_head.php";?>
</head>
<body>
  <?php include 'header.php'; ?>
  <h1 class="text-center mt-5">View Enquiries Request</h1>
  <div class="container p-5 my-5 border">
    <div class='row'>
      <?php  
        include 'booking/booking_functions.php';
        getEnquiryRequest();
      ?>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
