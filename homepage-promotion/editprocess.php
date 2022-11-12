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
          
          if (mysqli_query($conn, $sql)) {
              echo '<h1 class = "position-absolute bottom-0 start-50 translate-middle"> New record created successfully </h1>';
              } 
          else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
        
              $sql = "SELECT page_resource FROM Homepage_info ORDER BY version_id DESC LIMIT 1";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo $row["page_resource"];
                  }
                } else{
                  echo "0 results";
                }
              
          
    ?>

    <button type="button" class="btn btn-success position-absolute top-70 start-50 translate-middle mt-1">
        <a class="text-white" href="/Managing-Software-Projects/pageeditor.php"> Go Back </a>
    </button>
     
</body>
</html>