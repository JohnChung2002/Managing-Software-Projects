<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Cacti Succulent Kuching</title>
</head>
<body id = 'version_id'>
    <?php include 'header.php'; ?>
    <?php include 'database_credentials.php'; ?>
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
    
    <div class="container border border-success rounded my-5 " >
      <div class="row text-center">
        <div class="col-4 w-100">
          <h1 class="text-uppercase my-5">Cacti-Succulent Kuching</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class=" col-4 fs-4 w-75 my-5 ">
          <p> Cacti-Succulent Kuching is a local homegrown business specialized in selling various 
            type and size of succulent plants. Apart from selling succulent plants, we also sell different type 
            of gardening tools, soils and fertilizers at an affordable cost. Cacti-Succulent Kuching is setup in 
            2020  in  which  business  is  running  both  at  home  as  well  as  weekend  market.  Our  primary  
            mission  is  to  establish  a  long-lasting  relationship  of  trust  and  commitment  with  each  visitor 
            through providing the highest level of customer service.</p>
        </div>
      </div>
    </div>

    <?php include 'body.php'; ?>

    <div class="container border border-success text-center rounded my-5 h-100" >
      <nav id="navbar-example2" class="navbar bg-light px-3 mb-3">
      </nav>
      <div class="row text-center">
        <div class="col-4 w-100">
          <h1 class="text-uppercase mt-5">News and Updates</h1>
          <span class="d-block p-1" style="background-color: gray;"></span>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class=" col-4 fs-4 w-75 my-5 ">
          <p style="color: gray;"> No Updates for now, please check again later</p>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>