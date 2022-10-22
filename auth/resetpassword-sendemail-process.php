<?php
    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }
    
    require_once 'database_credentials.php'; // File of the database credentials PATH MAYBE UPDATED
    include dirname(__FILE__).'/send_email.php';
    
    // Set the session for message
    if(!isset($_SESSION)) { 
        session_start(); 
    } 

    $email = "";

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        checkUserAndSendEmail($servername, $username, $password, $database, $email);
    }

    // Function to check if the user exists in the database, and send a link to their email.
    function checkUserAndSendEmail($servername, $username, $password, $database, $email){
        // Initialise connection to database
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check if email exists within the database
        $sql = $conn -> prepare("SELECT * FROM user_credentials WHERE email_address = ?;");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        if(mysqli_num_rows($result) > 0){
            sendResetPasswordEmail($email);
            $_SESSION['rstpassMsg'] = "
                <div class='alert alert-success'>
                    Check your email for a link to reset your password.
                </div>
                ";
        }else{
            // EMAIL DOES NOT EXIST or Account not activated
            $_SESSION['rstpassMsg'] = "
                <div class='alert alert-danger'>
                    Email does not exist in the database.
                </div>
                ";
        }

        // Close connection
        mysqli_close($conn);
    }
?>