<?php
    function NameValidation(){
        $name = $nameMsg = "";
        $bool = false;
        if(isset($_POST["name"])){
            if(!empty($_POST["name"])){
                if(preg_match("/^[a-zA-Z\s]+$/", $_POST["name"])){
                    $nameMsg = "";
                    $name = $_POST["name"];
                    $bool = true;
                }else{
                    $nameMsg = "Only letters and white space allowed";
                }
            }else{
                $nameMsg = "Name is required";
            }
        }
        return array("name"=>$name, "errMsg"=>$nameMsg, "is_valid"=>$bool);
    }

    function EmailValidation(){
        $email = $emailMsg = "";
        $bool = false;
        if(isset($_POST["email"])){
            if(!empty($_POST["email"])){
                if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $emailMsg = "";
                    $email = $_POST["email"];
                    $bool = true;
                }else{
                    $emailMsg = "Please enter a valid email";
                }
            }else{
                $emailMsg = "Email is required.";
            }
        }
        return array("email"=>$email, "errMsg"=>$emailMsg, "is_valid"=>$bool);
    }

    function PasswordValidation(){
        $password = $passwordMsg = "";
        $bool = false;
        if(isset($_POST["password"])){
            if(!empty($_POST["password"])){
                if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])){
                    $passwordMsg = "";
                    $password = $_POST["password"];
                    $bool = true;
                }else{
                    $passwordMsg = "Password must contain at least 8 characters, 1 uppercase letter, 1 lowercase letter and 1 number.";
                }
            }else{
                $passwordMsg = "Password is required.";
            }
        }
        return array("password"=>$password, "errMsg"=>$passwordMsg, "is_valid"=>$bool);
    }

    function GenderValidation(){
        $gender = $genderMsg = "";
        $bool = false;
        if(isset($_POST["gender"])){
            $gender = $_POST["gender"];
            $bool = true;
        }else{
            $genderMsg = "Please select your gender.";
        }
        return array("gender"=>$gender, "errMsg"=>$genderMsg, "is_valid"=>$bool);
    }

    function HashValidation(){
        $hash = "";
        $bool = false;
        if(isset($_POST["hashValue"])){
            $hash = $_POST["hashValue"];
            $bool = true;
        }
        return array("hash"=>$hash, "is_valid"=>$bool);
    }

    function PhoneValidation(){
        $phone = $phoneMsg = "";
        $bool = false;
        if(isset($_POST["phone"])){
            if(!empty($_POST["phone"])){
                if(preg_match("/^[0-9]{10}$/", $_POST["phone"])){
                    $phoneMsg = "";
                    $phone = $_POST["phone"];
                    $bool = true;
                }else{
                    $phoneMsg = "Please enter a valid phone number.";
                }
            }else{
                $phoneMsg = "Phone number is required.";
            }
        }
        return array("phone"=>$phone, "errMsg"=>$phoneMsg, "is_valid"=>$bool);
    }
?>