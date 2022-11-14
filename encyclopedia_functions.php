<?php 


function getEncyclopediaDetails($item_id) {
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
	$conn = new mysqli($servername, $username, $password, $database);
    $command = "SELECT item_id, item_category, item_subcategory, item_name, item_image, availability_in_store, price_in_store, description FROM encyclopedia_items WHERE item_id=?";
    $stmt = mysqli_prepare($conn, $command);
    mysqli_stmt_bind_param($stmt, "i", $item_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    echo "
    <div style='width:100%'>
    <p class='card-text text-center'>
		<img class='img-fluid' style='width:30%; height: 50%;' src=".$row["item_image"]."/>
        <br>
        Item Name: 
        ".$row["item_name"]."
        <br>
        Item ID: 
        ".$row["item_id"]."
        <br>
        Item Subcategory: 
        ".$row["item_subcategory"]."
        <br>
        Availability in store: 
        ".$row["availability_in_store"]."
        <br>
        Price in store: 
        ".$row["price_in_store"]."
        <br>
        Description: 
        ".$row["description"]."
    </p>
    </div>
    <br/>";
}

function deleteEncylopediaItem() {
    if (!empty($_GET["id"])) {
        $item_id = $_GET["id"];
        require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
	    $conn = new mysqli($servername, $username, $password, $database);
        $command = "SELECT item_id, item_category, item_subcategory, item_name, item_image, availability_in_store, price_in_store, description FROM encyclopedia_items WHERE item_id=?";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $item_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        $command = "DELETE FROM encyclopedia_items WHERE item_id=?";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $item_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "
            <div class='container min-vh-100'>
                <div class='alert alert-success mt-4'>
                Item removed successfully!
                </div>
            </div>";
            mysqli_close($conn);
            return true;
        }
        mysqli_close($conn);
    }
    echo "
    <div class='container min-vh-100'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";
    return false;
}

function retrieveFormDetails($item_id){
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
	$conn = new mysqli($servername, $username, $password, $database);
    $command = "SELECT item_id, item_category, item_subcategory, item_name, item_image, availability_in_store, price_in_store, description FROM encyclopedia_items WHERE item_id=?";
    $stmt = mysqli_prepare($conn, $command);
    mysqli_stmt_bind_param($stmt, "i", $item_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    echo "
    <div class='px-2'>
    <form method='post' novalidate='novalidate'>
            <fieldset>
              <label>Product Name: <input type='text' name='productname' id='productname' required='required' value='".$row["item_name"]."'></label><br />
              <br />
              <label for='icategory'>Item Category:</label>
                <select id='icategory' name='icategory' required='required'>
                  <option value='".$row['item_category']."'>".$row['item_category']."</option>
                  <option value=''>Choose</option>
                  <option value='Compost & Soil'>Compost & Soil</option>
                  <option value='Fertiliser'>Fertiliser</option>
                  <option value='Pesticides'>Pesticides</option>
                  <option value='Pots & Vases'>Pots & Vases</option>
                  <option value='Tools & Accessories'>Tools & Accessories</option>
                  <option value='Seeds'>Seeds</option>
                  <option value='Plants'>Plants</option>
                </select>
              <br />
              <br />
              <label>Item Subcategory: <input type='text' name='isubcategory' id='isubcategory' maxlength='30' required='required' value='".$row['item_subcategory']."'></label><br />
              <br />
              <label>Item Image (Link Only): <input type='text' name='iimage' id='iimage' maxlength='50' required='required' value='".$row['item_image']."'></label><br />
              <br />
                <p>Item Availability In Store: </p>";   
            if($row["availability_in_store"]=="Available"){
                echo"
                <div class='form-check form-check-inline'>
                  <input type='radio' id='available' name='iavailability' value='Available' CHECKED>Available<br/>
                </div>
                <div class='form-check form-check-inline'>
                  <input type='radio' id='notavailable' name='iavailability' value='Not Available'>Not Available<br/>
                </div>
                </br>
                </br>";
            }elseif($row["availability_in_store"]=="Not Available"){
                echo"
                <div class='form-check form-check-inline'>
                  <input type='radio' id='available' name='iavailability' value='Available'>Available<br/>
                </div>
                <div class='form-check form-check-inline'>
                  <input type='radio' id='notavailable' name='iavailability' value='Not Available' CHECKED>Not Available<br/>
                </div>
                </br>
                </br>";
            };
            echo"
              <label>Price In Store: <input type='text' name='iprice' id='iprice' required='required' value='".$row['price_in_store']."'></label><br />
              <br />
              <label>Description: <input type='text' name='idesc' id='idesc' required='required' value='".$row['description']."'></label><br />
            </fieldset>
            <br />
            <div id='button'>
              <input type='submit' class='buttons' value='Submit'>        
              <input type='reset' class='buttons' value='Reset'>
            </div>
		      </form>
              </div>";
}

function editEncylopediaItem() {
    if (!empty($_GET["id"])) {
        $item_id = $_GET["id"];
        require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
	    $conn = new mysqli($servername, $username, $password, $database);
        $command = "SELECT item_id, item_category, item_subcategory, item_name, item_image, availability_in_store, price_in_store, description FROM encyclopedia_items WHERE item_id=?";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $item_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        $productname = $_POST['productname'];
        $icategory = $_POST['icategory'];
        $isubcategory = $_POST['isubcategory'];
        $iimage = $_POST['iimage'];
        $iavailability = $_POST['iavailability'];
        $iprice = $_POST['iprice'];
        $idesc = $_POST['idesc'];
        
        $command = "UPDATE encyclopedia_items SET item_category= '$icategory', item_subcategory= '$isubcategory', item_name= '$productname', item_image= '$iimage', availability_in_store= '$iavailability', price_in_store= '$iprice', description= '$idesc' WHERE item_id=?";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "i", $item_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "
            <div class='container min-vh-100'>
                <div class='alert alert-success mt-4'>
                Item edited successfully!
                </div>
            </div>
            
            <div class='d-grid gap-2'>
                <a href='admin_encyclopedia_interface.php'><button type='button' class='btn btn-primary'>Back To Encyclopedia</button></a>
                <br>
            </div>
            ";
            mysqli_close($conn);
            return true;
        }
        mysqli_close($conn);
    }
    echo "
    <div class='container min-vh-100'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";
    return false;
}
?>