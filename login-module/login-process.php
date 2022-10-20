<?php
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
    
    // Set the session for message
    session_start();

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
        $sql = $conn -> prepare("SELECT * FROM user_credentials WHERE email_address = ? && account_status = 'Activated';");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) > 0){
            $sql = $conn -> prepare("SELECT password, user_role, user_id FROM user_credentials WHERE email_address = ?;");
            $sql->bind_param('s', $email);
            $sql->execute();
            $result = $sql->get_result();
            $user = mysqli_fetch_assoc($result);
            $storedPassword = $user['password'];
            $user_role = $user['user_role'];
            $user_id = $user['user_id'];

            if(password_verify($userInputPassword, $storedPassword)){
                // CORRECT PASSWORD
                
                $_SESSION['is_login'] = true;
                $_SESSION['user_id'] = $user_id;
                // Check user/admin
                if($user_role == "User"){
                    // User 
                    // Redirect to user dashboard
                    $_SESSION['user_role'] = "User";
                }else{
                    // Admin
                    // Redirect to admin dashboard
                    $_SESSION['user_role'] = "Admin";
                }
                header("Location: dashboard.php");
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

        // Close connection
        mysqli_close($conn);
    }
?>