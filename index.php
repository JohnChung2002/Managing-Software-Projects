<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Cacti Succulent Kuching</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php'; ?>
    <?php
        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
    ?>
     <div id="CactusBanner" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#CactusBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#CactusBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#CactusBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/Cactiplant1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5></h5>
              <p></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/Cactus4.png" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5></h5>
              <p></p>
            </div>
          </div>
          <div class="carousel-item">
          <img src="images/Cactus1.png" class="d-block w-100 h-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5></h5>
            <p></p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#CactusBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#CactusBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    

    <div class="container border border-success w-100 rounded my-5 " >
          <div class="row text-center">
            <div class="col-4 w-100">
              <h1 class="text-uppercase my-5">Cacti-Succulent Kuching</h1>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class=" col-4 fs-4 w-75 my-5 ">
              <?php
                $sql = "SELECT page_resource FROM homepage_info ORDER BY version_id DESC LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo $row["page_resource"];
                    }
                  } else{
                    echo "0 results";
                  }
                
              ?>
            </div>
          </div>
    </div>

    <div class="container border border-success text-center w-100 rounded my-5 h-100" >
      <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
      </nav>
      <div class="row text-center">
        <div class="col-4 w-100">
          <h1 class="text-uppercase mt-5">Announcement</h1>
          <span class="d-block p-1" style="background-color: gray;"></span>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class=" col-4 fs-4 w-100 my-5 ">
        <?php
        $conn = mysqli_connect($servername, $username, $password, $database);
        $result2 = mysqli_query($conn,"SELECT * FROM content_info WHERE content_type = 'Announcement'");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        ?>
        <?php  
		    if (mysqli_num_rows($result2) > 0) {
	    ?>
            <table class="table">
                <?php
                $i=0;
                while($row = mysqli_fetch_array($result2)) {
                ?>
                <tr>
                    <td><img src =<?php echo $row["content_image"]; ?> class="img-thumbnail" alt = "" width="400" height="400"/></td>
                    <td><?php echo $row["content_title"]; ?></td>
                    <td><a href="announcement.php?content_id=<?php echo $row["content_id"]; ?>">Read More</a></td>
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
			}
			else{
				echo "No results found";
			}
			?>
            
        </div>
      </div>
    </div>

    <div class="container border border-success text-center w-100 rounded my-5 h-100" >
      <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
      </nav>
      <div class="row text-center">
        <div class="col-4 w-100">
          <h1 class="text-uppercase mt-5">Promotions</h1>
          <span class="d-block p-1" style="background-color: gray;"></span>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class=" col-4 fs-4 w-100 my-5 ">
        <?php
        $conn = mysqli_connect($servername, $username, $password, $database);
        $result3 = mysqli_query($conn,"SELECT * FROM content_info WHERE content_type = 'Promotion'");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        ?>
        <?php  
		    if (mysqli_num_rows($result3) > 0) {
	    ?>
            <table class="table">
                <?php
                $i=0;
                while($row = mysqli_fetch_array($result3)) {
                ?>
                <tr>
                    <td><img src =<?php echo $row["content_image"]; ?> class="img-thumbnail" alt = "" width="400" height="400"/></td>
                    <td><?php echo $row["content_title"]; ?></td>
                    <td><a href="announcement.php?content_id=<?php echo $row["content_id"]; ?>">Read More</a></td>
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
			}
			else{
				echo "No results found";
			}
			?>
            
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>