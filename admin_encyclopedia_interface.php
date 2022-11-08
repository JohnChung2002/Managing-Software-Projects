<?php 
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php";?>
    <title>Gardening Encyclopedia</title>

    <style>
      .card:hover{
        box-shadow: 5px 6px 6px 2px #e9ecef;
        transform: scale(1.1);
      }
    </style>
</head>
<body>
  <?php include 'header.php'; ?>

    <div class="container border border-success rounded my-5">
      <div class="row text-center">  
        <div class="col-4 w-100">
          <h1 class="text-uppercase my-4">Gardening Encyclopedia</h1>
          <p class="fs-5 fw-bold text-center">Explore plants, gardening tools and fertilizer</p>
		  	  <img src="images/Cactus8.jpg" class="w-auto p-3">
		<br>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="w-75 my-4">
		      <p class="fs-5 text-center">
		        Start editing by choosing one of the category below!
		       </p>
        </div>

<div class="card-group mb-3">
  <div class="card mx-5" style="cursor: pointer;" onclick="window.location.href='admin_plant_encyclopedia.php'">
    <img class="card-img-top" src="images/Plants.jpeg" alt="...">
    <div class="card-body">
      <h5 class="card-title">Plants</h5>
      <p class="card-text">
		Plants are multicellular organisms in the kingdom Plantae that produce their own food through photosynthesis.  
		Plants play an important role in the global ecosystem. 
		They produce the majority of the world's oxygen and play an important role in the food chain because many organisms eat plants or organisms that eat plants. 
	  </p>
    </div>
  </div>
   <div class="card" style="cursor: pointer;" onclick="window.location.href='admin_gardeningtools_encyclopedia.php'">
    <img class="card-img-top" src="images/tools.jpeg" alt="...">
    <div class="card-body">
      <h5 class="card-title">Gardening Tools</h5>
      <p class="card-text">
		A gardening tool or garden tool is any of the many tools designed for gardens and gardening, which overlap with the range of tools designed for agriculture and horticulture. 
		Garden tools can be both hand tools and power tools.
	  </p>
    </div>
  </div>
   <div class="card mx-5" style="cursor: pointer;" onclick="window.location.href='admin_fertilizer_encyclopedia.php'">
    <img class="card-img-top" src="images/fertilizer.jpeg" alt="...">
    <div class="card-body">
      <h5 class="card-title">Fertilizer</h5>
      <p class="card-text">
		Fertiliser is a natural or synthetic material that is added to the soil or plants to promote growth and productivity. 
		They provide nutrients to the plants.
	  </p>
    </div>
  </div>
</div>
      </div>
	  <br>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>