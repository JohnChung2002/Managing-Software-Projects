<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php";?>
    <title>Gardening Encyclopedia</title>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container border border-success rounded my-5">
      <div class="row text-center">  
        <div class="col-4 w-100">
          <h1 class="text-uppercase my-4">Add Item Successfully</h1>
          <?php
            if(isset($_POST['fname'])){
              $conn = start_connection();
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }else{
                echo "Successfully connecting to the database\n";
                echo "<br />";
              }
              
              // get the post records
              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $mail = $_POST['mail'];
              $address = $_POST['saddress'];
              $citytown = $_POST['citytown'];
              $state = $_POST['statelist'];
              $postcode = $_POST['postcode'];
              $contact = $_POST['tel'];
              $subject = $_POST['subject'];
              $section = $_POST['servlist'];
              $service = $_POST['subcategory'];
              $comment = $_POST['issuedes'];
              
              $sql = "INSERT INTO encylopedia_items (`first_name`, `last_name`, `email`, `address`, `citytown`,`state`,`postcode`,`contact`,`subject`,`section`,`service`,`comments`) VALUES ('$fname', '$lname', '$mail', '$address', '$citytown','$state','$postcode','$contact','$subject','$section','$service','$comment')";

              // insert in database 
              $rs = mysqli_query($conn, $sql);
              if($rs){
                echo "Form submitted successfully.";
              }
            else{
              echo "Error: " . $sql . "<br />" . mysqli_error($con);
          
            }
            }
          ?>
          
        </div>
      </div>
    </div>
  <?php include 'footer.php'; ?>
</body>
</html>