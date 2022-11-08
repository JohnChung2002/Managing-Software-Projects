<?php 

if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'].'/Managing-Software-Projects/api/api_functions.php';

date_default_timezone_set("Asia/Kuala_Lumpur");

function newenquiry(){
    if (!empty($_POST["name"]) && !empty($_POST["email"])  && !empty($_POST["inputSubject"]) && !empty($_POST["inputComment"])) {
       

        $name = $_POST["name"];
        $email = $_POST["email"];
        $InputReason = $_POST["inputSubject"];
        $InputComment = $_POST["inputComment"];
        $conn = start_connection();
    
        while (True){   

            $sql = $conn -> prepare("SELECT * FROM enquiries WHERE contact_info = ?;");
            $sql->bind_param('s', $email);
            $sql->execute();
            $result = $sql->get_result();

            if (mysqli_num_rows($result) == 0) {
                mysqli_free_result($result);

                $stmt = $conn -> prepare("INSERT INTO enquiries (contact_name, contact_info, enquiry_subject, enquiry_content, enquiry_status) VALUES (?, ?, ?, ?, 'Unanswered');");
                $stmt->bind_param('ssss', $name, $email, $InputReason, $InputComment);
                $stmt->execute();                             
                $stmt->close();
                echo "
                <div class='container'>
                    <div class='alert alert-success mt-4'>
                    Enquiry has been submitted successfully! You will receive a response back to your email within 5 business days depending on the queue. Please do check your junk folder too.
                    </div>
                </div>";
                return true; 
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



function getEnquiryRequest(){


    $conn = start_connection();
   
    $user_id = $_SESSION["user_id"];
    $command = "SELECT enquiry_id, contact_name, contact_info, enquiry_subject, enquiry_content, enquiry_status FROM enquiries ORDER BY contact_name DESC;";
    $result = mysqli_query($conn , $command);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        
            echo"
            <div class='col-md-10'>
                <div class='card mb-4 shadow-sm'>
                <div class='card-body'>
                    <p class='card-text'>
                    Enquiry requested by: " . $row["contact_name"] . " 
                    <br/>
                    email : ". $row["contact_info"] . "
                    <br/>
                    Subject: " . $row["enquiry_subject"] . "
                    <br/>
                    Comments: " . $row["enquiry_content"] . "
                    <br/>
                    Status: " . $row["enquiry_status"] . "
                    <br/>
                    Enquiry ID: " . $row["enquiry_id"] . "
                    </p>";
            if ($row["enquiry_status"] == "Unanswered") {
                echo "
                <div class='d-flex justify-content-between align-items-center'>
                    <div class='btn-group'>
                        <button type='button' class='btn btn-primary' onclick='window.location.href=\"replyenquiry.php?id=". $row["enquiry_id"] ."\"'>Reply</button>
                    </div>
                </div>";
            }   
            echo "</div>
                </div>
            </div>";
        }
    }else {
        echo "
        <div class='container min-vh-100'>
            <div class='alert alert-info'>
            No enquiries have been submitted.
            </div>
        </div>";
    }
}

function getEnquiryInformation($enquiry_id) {
    $conn = start_connection();
    // $user_id = $_SESSION["user_id"];
    $command = "SELECT contact_name, contact_info, enquiry_subject, enquiry_content FROM enquiries WHERE enquiry_id=? ;";
    $stmt = mysqli_prepare($conn, $command);
    mysqli_stmt_bind_param($stmt, "s", $enquiry_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    echo "
    <strong>Enquiry requested by :</strong> " . $row["contact_name"] . " 
    <br/>
    <strong>Email :</strong> ". $row["contact_info"] . "
    <br/>
    <strong>Subject :</strong> " . $row["enquiry_subject"] . "
    <br/>
    <strong>Comments :</strong> " . $row["enquiry_content"] . "
    </p>";
}

function answerenquiry() {
    if ( !empty($_POST["inputReason"])) {

        $enquiry_id = $_GET["id"];
        $reason = $_POST["inputReason"];
        
        $conn = start_connection();
        $command = "UPDATE enquiries SET enquiry_status='Answered', enquiry_reply=? WHERE enquiry_id=?;";
        $stmt = mysqli_prepare($conn, $command);
        mysqli_stmt_bind_param($stmt, "ss", $reason, $enquiry_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "
            <div class='container min-vh-100'>
            <div class='alert alert-success mt-4'>
                Enquiry replied successfully! A mail will be sent to their email.
                </div>
            </div>";
            mysqli_close($conn);
            return true;
        }
        mysqli_close($conn);
    }
    echo "
    <div class='container'>
        <div class='alert alert-danger'>
        Invalid request. Please try again.
        </div>
    </div>";
    return false;
}
?>