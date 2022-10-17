<?php
    include '../input_validation.php';
    require_once '../database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED

    $name = $userInputPassword = $email = $gender = $phone = "";
    
    $emailMsgBool = EmailValidation();
    $passwordMsgBool = PasswordValidation();

    // Input Validation
    if($emailMsgBool["is_valid"]){
        $email = $emailMsgBool["email"];
    }else{
        echo $emailMsgBool["errMsg"];
    }

    if($passwordMsgBool["is_valid"]){
        $userInputPassword = $passwordMsgBool["password"];
    }else{
        echo $passwordMsgBool["errMsg"];
    }

    // All input validation is successful.
    if($emailMsgBool["is_valid"] && $passwordMsgBool["is_valid"]){
        // echo "<br/>All input is valid";

        checkUserPassword($servername, $username, $password, $database, $email, $userInputPassword);
    }

    // Function to check if the user exists in the database, and if the password is correct.
    function checkUserPassword($servername, $username, $password, $database, $email, $userInputPassword){
        // Initialise connection to database
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check if email exists within the database
        $sql = "SELECT * FROM user_credentials WHERE email_address = '$email' && account_status = 'Activated'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $command = "SELECT password, user_role, user_id FROM user_credentials WHERE email_address = '$email';";
            $storedPassword = mysqli_fetch_assoc(mysqli_query($conn, $command))['password'];
            $user_role = mysqli_fetch_assoc(mysqli_query($conn, $command))['user_role'];
            $user_id = mysqli_fetch_assoc(mysqli_query($conn, $command))['user_id'];
            if(password_verify($userInputPassword, $storedPassword)){
                // CORRECT PASSWORD
                session_start();
                $_SESSION['is_login'] = true;
                $_SESSION['user_id'] = $user_id;
                // Check user/admin
                if($user_role == "User"){
                    // User 
                    // Redirect to user dashboard
                    $_SESSION['user_role'] = "User";
                    header("Location: ../index.php");
                }else{
                    // Admin
                    // Redirect to admin dashboard
                    $_SESSION['user_role'] = "Admin";
                }
            }else{
                // INCORRECT PASSWORD
                echo "Password is incorrect";
            }
        }else{
            // EMAIL DOES NOT EXIST or Account not activated
            echo "\nEmail does not exist or account is not activated";
        }

        // Close connection
        mysqli_close($conn);
    }
?>