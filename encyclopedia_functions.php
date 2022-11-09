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
    <p class='card-text'>
		<img class='img-fluid' src=".$row["item_image"]."/>
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
    </p>";
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
?>