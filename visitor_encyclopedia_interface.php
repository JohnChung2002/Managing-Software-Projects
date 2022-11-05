<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php";?>
    <title>Gardening Encyclopedia</title>
</head>
<body>
  <?php include 'header.php'; ?>
     <div id="CactusBanner" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#CactusBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#CactusBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/Cactiplant1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/Cactus4.png" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
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

    <div class="container border border-success rounded my-5">
      <div class="row text-center">  
        <div class="col-4 w-100">
          <h1 class="text-uppercase my-4">Gardening Encyclopedia</h1>
		  	  <img src="images/Cactiplant1.jpg">
		<br>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="w-75 my-4">
          <p class="fs-5 fw-bold">Explore plants, gardening tools and fertilizer</p>
		  <p>
		Garden tools are an important part of garden supplies. 
		The right garden tools can make taking care of your garden easy and productive.
		Not all garden tools are equal. You want tools that you can use on a daily basis that are economically fashioned. 
		Some tools are made for people with large hands, while others are crafted for smaller hands. 
		Ergonomic tools may have silicone grip handles or handles with easy grip indentations. 
		There are specific garden tools for the various tasks that are part of gardening. 
		For example, specific garden tools and supplies are designed for vegetable, herbs, and flower gardening. 
		Whether you have a raised bed garden or a field garden, you will need these hand tools. 
		A few of these tools include, hand weeder, trowel, transplanter, bulb planter, hand fork, hand rake, garden seeder, spray bottle, carry bag, two or more pairs of gardening gloves, carry tote, cultivator, kneeling pad, and other tools. 
		Pest control requires various tools, such as sprayers and perhaps protective masks. 
		If you're using chemical sprays, you'll want protective clothing, goggles, and a hat to prevent blowback from changing winds. 
		You'll need separate containers for different types of chemical products, such as fungicides, fertilizers, specific insect sprays. If you're an organic gardener, you won't require the kind of pest control tools and supplies.
		</p>
        </div>

<div class="card-group mb-3">
  <div class="card mx-5" style="cursor: pointer;" onclick="window.location.href='plant_encyclopedia.php'">
    <img class="card-img-top" src="images/Cactus7.jpg" alt="...">
    <div class="card-body">
      <h5 class="card-title">Plants</h5>
      <p class="card-text">
		Plants are multicellular organisms in the kingdom Plantae that use photosynthesis to make their own food. 
		There are over 300,000 species of plants; common examples of plants include grasses, trees, and shrubs. 
		Plants have an important role in the world’s ecosystems. 
		They produce most of the world’s oxygen, and are important in the food chain, as many organisms eat plants or eat organisms which eat plants. 
		The study of plants is called botany.
	  </p>
    </div>
  </div>
   <div class="card" style="cursor: pointer;" onclick="window.location.href='gardeningtools_encyclopedia.php'">
    <img class="card-img-top" src="images/Cactus7.jpg" alt="...">
    <div class="card-body">
      <h5 class="card-title">Gardening Tools</h5>
      <p class="card-text">
		A gardening tool or garden tool is any one of many tools made for gardens and gardening and overlaps with the range of tools made for agriculture and horticulture. 
	    Garden tools can also be hand tools and power tools.
	  </p>
    </div>
  </div>
   <div class="card mx-5" style="cursor: pointer;" onclick="window.location.href='fertilizer_encyclopedia.php'">
    <img class="card-img-top" src="images/Cactus7.jpg" alt="...">
    <div class="card-body">
      <h5 class="card-title">Fertilizer</h5>
      <p class="card-text">
		A natural or artificial material called fertiliser is added to the soil or plants to promote growth and productivity. 
	  They give the plants nutrients.
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