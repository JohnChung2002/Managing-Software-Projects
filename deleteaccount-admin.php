<?php
    include $_SERVER['DOCUMENT_ROOT'].'/auth/is_admin.php';
    include $_SERVER['DOCUMENT_ROOT'].'/database_credentials.php';

    // Change the user role
    if($_SESSION['user_role'] == "Admin"){
        $userRole = "User";
    } else {
        $userRole = "Admin";
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user'])) {
        // Process the deletion part here
        $user_id = $_POST['user'];
        // Initilaize the connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        // Generate token expiry
        $tokenExpiry = date("Y-m-d H:i:s", strtotime("+1 day")); // 1 day from now
        $stmt = $conn -> prepare("UPDATE user_credentials SET token_expiry = ?, account_status = 'Pending Delete' WHERE user_id = ?");
        $stmt->bind_param('ss', $tokenExpiry, $user_id);
        $stmt->execute();

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Delete <?php echo"$userRole";?> Page</title>
</head>
<body>
    
<?php include 'header.php';?>

<div class="container p-3 vh-100">
    <span><?php if(isset($_SESSION['signupMsg'])){echo $_SESSION['signupMsg']; session_unset();} ?></span>
    <form method="post" id="signupreset-form" onsubmit="return confirm('Are you sure you want to delete this account?');" novalidate>
        <fieldset>
            <legend>Delete <?php echo"$userRole";?></legend>
        
            <div class="row mb-3">
                <label for="user" class="col-sm-2 col-form-label"><?php echo"$userRole";?></label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default selected example" name="user" id="user" required>
                    <option disabled selected value=""> -- choose <?php echo$userRole;?> to delete -- </option>

<?php
    // Retrieve all user's name from the database
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
    $sql = "SELECT UI.name, UI.user_id FROM user_info AS UI INNER JOIN user_credentials AS UC ON UI.user_id = UC.user_id WHERE UC.user_role = '$userRole' && UC.account_status = 'Activated'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $name = $row['name'];

            echo "<option value='$user_id'>$name</option>";
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);

?>

                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </fieldset>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
