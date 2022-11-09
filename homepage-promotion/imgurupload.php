<?php

    if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
        http_response_code(403);
        exit;
    }

    require_once $_SERVER['DOCUMENT_ROOT']."/Managing-Software-Projects/database_credentials.php";

    // Set the session for message
    if(!isset($_SESSION)) { 
        session_start(); 
    }

    $client_id = "180713470d0aee0";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_FILES["content_image"]["content_title"])){
            $_SESSION['editMsg'] = "<div class='alert alert-success'>
                Profile updated.
            </div>";
            $imgurBool = uploadImgur($_FILES['content_image'], $client_id);
            if($imgurBool['is_valid']){
                $imgurLink = $imgurBool['imgurLink'];
                
                $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
                $sql = "UPDATE content_info SET content_image = ? WHERE content_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $imgurLink, $_SESSION['content_id']);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
    
    function uploadImgur($file, $client_id){
        $imgurLink = "";
        $bool = false;
        $url = 'https://api.imgur.com/3/image';
        $headers = array("Authorization: Client-ID $client_id");
        $postfields = array('content_image' => base64_encode(file_get_contents($file['tmp_name'])));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        if($response->success){
            $imgurLink = substr_replace($response->data->link,"b",-4,0);
            $bool = true;
        }
        return array("imgurLink"=>$imgurLink, "is_valid"=>$bool);
    }


?>