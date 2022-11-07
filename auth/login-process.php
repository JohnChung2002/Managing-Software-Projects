<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }
    
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
    
    // Set the session for message
    if(!isset($_SESSION)) { 
        session_start(); 
    } 

    $userInputPassword = $email = "";

    if(isset($_POST['password']) && isset($_POST['email'])){
        $userInputPassword = $_POST['password'];
        $email = $_POST['email'];
        checkUserPassword($servername, $username, $password, $database, $email, $userInputPassword);
    }

    // Function to check if the user exists in the database, and if the password is correct.
    function checkUserPassword($servername, $username, $password, $database, $email, $userInputPassword){
        // Initialise connection to database
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check if email exists within the database
        $sql = $conn -> prepare("SELECT * FROM user_credentials WHERE email_address = ? && account_status = 'Activated' || account_status = 'Pending Delete';");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) > 0){
            $sql = $conn -> prepare("SELECT password, user_role, user_id, account_status FROM user_credentials WHERE email_address = ?;");
            $sql->bind_param('s', $email);
            $sql->execute();
            $result = $sql->get_result();
            $user = mysqli_fetch_assoc($result);
            $storedPassword = $user['password'];
            $user_role = $user['user_role'];
            $user_id = $user['user_id'];
            $account_status = $user['account_status'];
            mysqli_free_result($result);
            if(password_verify($userInputPassword, $storedPassword)){
                // CORRECT PASSWORD
                $_SESSION['is_login'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_role'] = $user_role;
                
                // header("Location: dashboard.php");
            }else{
                // INCORRECT PASSWORD
                $_SESSION['loginMsg'] = "
                    <div class='alert alert-danger'>
                        Password is incorrect.
                    </div>
                    ";
            }
        }else{
            // EMAIL DOES NOT EXIST or Account not activated
            $_SESSION['loginMsg'] = "
                <div class='alert alert-danger'>
                    Email does not exist or account is not activated.
                </div>
                ";
        }

        // Change the account status to activated if the account is pending delete
        if($_SESSION['is_login'] && $account_status == 'Pending Delete'){
            $sql = $conn -> prepare("UPDATE user_credentials SET token_expiry = NULL, account_status = 'Activated' WHERE user_id = ?;");
            $sql->bind_param('i', $user_id);
            $sql->execute();
        }

        // Close connection
        mysqli_close($conn);
    }
?>