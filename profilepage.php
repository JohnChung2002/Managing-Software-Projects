<?php
    include 'auth/is_loggedin.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <?php include 'page_head.php'; ?>
    <title>Profile Page</title>
</head>
<body>
<?php include 'header.php';
    include 'profile_info.php';
    $profile = getProfile();
    $name = $profile['name'];
    $email = $profile['email'];
    $phone = $profile['phone'];
    if(!is_null($profile['preference'])){
        $preference = implode(",",$profile['preference']);
    } else {
        $preference = "No preference";
    }
    if(!is_null($profile['profileImage'])){
        $pictureHash = $profile['profileImage'];
    } else {
        $pictureHash = "mCHMpLT";
    }
 
    $client_id = "180713470d0aee0";
    $ch = curl_init();
    $url = "https://api.imgur.com/3/image/$pictureHash";
    curl_setopt_array($ch,[CURLOPT_URL=>$url,CURLOPT_HTTPHEADER=>array('Authorization: Client-ID ' . $client_id),CURLOPT_RETURNTRANSFER=>TRUE,CURLOPT_SSL_VERIFYPEER=>FALSE]);
    $result = curl_exec($ch);
    curl_close($ch);
    $json_array = json_decode($result, true);
    $image_url = $json_array['data']['link'];

    echo"
    <div class='container p-5 align-items-center justify-content-center'>
        <div class='col-auto'>
            <input type='submit' class='btn btn-outline-primary float-end' name='btnEditProfile' value='Edit Profile'/>
        </div>
        <div class='row'>
            <div class='profile-img'>
                <img src='$image_url' class='rounded mx-auto d-block' alt='$name Profile Picture' />
            </div>
        </div>
        <div class='row'>
            <div class='col-md-8 p-5'>
                <div class='row my-3'>
                    <div class='col-md-6'>
                        <label>Name</label>
                    </div>
                    <div class='col-md-6'>
                        <p id='name'>$name</p>
                    </div>
                </div>
                <div class='row my-3'>
                    <div class='col-md-6'>
                        <label>Email</label>
                    </div>
                    <div class='col-md-6'>
                        <p id='email'>$email</p>
                    </div>
                </div>
                <div class='row my-3'>
                    <div class='col-md-6'>
                        <label>Phone</label>
                    </div>
                    <div class='col-md-6'>
                        <p id='phone'>$phone</p>
                    </div>
                </div>
                <div class='row my-3'>
                    <div class='col-md-6'>
                        <label>Preference</label>
                    </div>
                    <div class='col-md-6'>
                        <p id='preference'>$preference</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
  include 'footer.php';
  ?>
</body>
</html>