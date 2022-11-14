<?php 
    include 'auth/is_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "page_head.php";?>
    <title>Gardening Encyclopedia</title>
    <style>
      aside{
        width: 25%;
      }
      </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container border border-success rounded my-5">
        <div class="col-4 w-100">
          <h1 class="text-uppercase my-4 text-center">Add New Item</h1>
          <br/>
          <aside class="float-end">
              Instructions for uploading image: <br/>
                1. Head over to <a target=”_blank” href="https://imgur.com/upload">Imagur</a> to upload an image. <br/>
                2. Upload the image/copy the link of the image from online and paste it in the box. <br/>
                3. Hover over the image to show the copy link button and click it. <br />
                4. Paste it in to the "Item Image" field and add .jpeg behind the link!
          </aside>
          <div class="px-2">
          <form action="admin_encyclopedia_addtodatabase.php" method="post" novalidate="novalidate">
            <fieldset>
              <label>Product Name: <input type="text" name="productname" id="productname" maxlength="50" required="required"></label><br />
              <br />
              <label for="icategory">Item Category:</label>
                <select id="icategory" name="icategory" required="required">
                  <option value="">Choose</option>
                  <option value="Compost & Soil">Compost & Soil</option>
                  <option value="Fertiliser">Fertiliser</option>
                  <option value="Pesticides">Pesticides</option>
                  <option value="Pots & Vases">Pots & Vases</option>
                  <option value="Tools & Accessories">Tools & Accessories</option>
                  <option value="Seeds">Seeds</option>
                  <option value="Plants">Plants</option>
                </select>
              <br />
              <br />
              <label>Item Subcategory: <input type="text" name="isubcategory" id="isubcategory" maxlength="30" required="required"></label><br />
              <br />
              <label>Item Image (Link Only): <input type="text" name="iimage" id="iimage" maxlength="50" required="required"></label><br />
              <br />
                <p>Item Availability In Store: </p>
                <div class="form-check form-check-inline">
                  <input type="radio" id="available" name="iavailability" value="Available">
                  <label for="available">Available</label><br>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" id="notavailable" name="iavailability" value="Not Available">
                  <label for="notavailable">Not Available</label><br>
                </div>
                </br>
                </br>
              <label>Price In Store: <input type="text" name="iprice" id="iprice" required="required"></label><br />
              <br />
              <label>Description: <input type="text" name="idesc" id="idesc" required="required"></label><br />
            </fieldset>
            <br />
            <div id="button">
              <input type="submit" class="buttons" value="Submit">        
              <input type="reset" class="buttons" value="Reset">
            </div>
		      </form>
          </div>
          <br />
        </div>
    </div>
  <?php include 'footer.php'; ?>
</body>
</html>