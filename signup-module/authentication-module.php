<?php  
    // Hash the password received on the server side for integrity check
    function hashPasswordIntegrity($password){
        $hash = hash('SHA256', $password);
        return $hash;
    }

    // Check the password integrity
    function checkPasswordIntegrity($password, $clientHashValue){
        $serverHashValue = hashPasswordIntegrity($password);
        if($clientHashValue == $serverHashValue){
            return true;
        }else{
            return false;
        }
    }

    // Hash the password to be stored in the database
    function hashPasswordDatabase($password){
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $hash;
    }

    // Process to hash the password and store it in the database if the password integrity is successful
    function processHashPassword($password, $clientHashValue){
        $bool = false;
        $hash = "";
        if(checkPasswordIntegrity($password, $clientHashValue)){
            $hash = hashPasswordDatabase($password);
            $bool = true;
        }
        return array('hashedPassword'=>$hash, 'is_integrity'=>$bool);
    }
?>