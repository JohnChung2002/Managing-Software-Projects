<?php 

if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/api/api_functions.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

function newenquiry(){
    if (!empty($_POST["name"]) && !empty($_POST["email"])  && !empty($_POST["InputReason"]) && !empty($_POST["inputComment"])) {
       
        $enquiry_id = $_POST["enquiry_id"];
        // $enquiry_id = $GET["enquiry_id"];
        // $enquiry_id = $_SESSION["enquiry_id"];

        $name = $_POST["name"];
        $email = $_POST["email"];
        $InputReason = $_POST["InputReason"];
        $InputComment = $_POST["InputComment"];
        $conn = start_connection();
    
        while (True){
            $command = "SELECT * FROM enquiries WHERE enquiry_id=?;";
            $stmt = mysqli_prepare($conn, $command);
            mysqli_stmt_bind_param($stmt, "s", $enquiry_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 0) {
                mysqli_free_result($result);
                $command = "INSERT INTO enquiries (enquiry_id, contact_name, contact_info, enquiry_subject, enquiry_content, enquiries_status) VALUES (?, ?, ?, 'Unanswered');";
                $stmt = mysqli_prepare($conn, $command);
                mysqli_stmt_bind_param($stmt, "ssssi", $enquiry_id, $name, $email, $InputReason, $InputComment);
                if (mysqli_stmt_execute($stmt)) {
                    echo "
                    <div class='container'>
                        <div class='alert alert-success mt-4'>
                        Enquiry has been submitted successfully! You will receive a response back to your email within 5 business days depending on the queue. Please do check your junk folder too.
                        </div>
                    </div>";
                    mysqli_close($conn);
                    return true;
                }
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }
    
    echo"
    <div class='container'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>"; 
    return false;
}
?>