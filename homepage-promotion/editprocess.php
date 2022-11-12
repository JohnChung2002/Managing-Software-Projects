<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../page_head.php'; ?>
    <title>Cacti Succulent Kuching</title>
</head>
<body id = 'version_id'>
    <?php include '../database_credentials.php'; ?>
    <?php

        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        
        $page_resource = $_POST['page_resource'];
        $remarks = $_POST['remarks'];
        $sql = "INSERT INTO homepage_info (page_resource,remarks)
            VALUES ('$page_resource','$remarks')";      
          
    ?>

        <div class="container border border-success w-50 rounded my-5 " >
                  <div class="row text-center">
                    <div class="col-4 w-100">
                      <h1 class="text-uppercase my-5">
                        <?php
                           if (mysqli_query($conn, $sql)) {
                            echo 'New record created successfully ';
                            } 
                        else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        ?>
                      </h1>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class=" col-4 fs-4 w-75 my-5 ">

                          <button type="button" class="btn btn-success position-absolute top-70 start-50 translate-middle mt-1">
                              <a class="text-white" href="/Managing-Software-Projects/pageeditor.php"> Go Back </a>
                          </button>
                    </div>
                  </div>
            </div>

    
     
</body>
</html>