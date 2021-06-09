<?php
session_start();
  if(!empty($_POST['g-recaptcha-response']))
  {     
        require_once 'private_info.php';
        $secret = SECRET_KEY;
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["fullname"] = $_POST["fullname"];
            $_SESSION["company"] = $_POST["company"];
            $_SESSION["response"] = $_POST["response"];  
            header("Location: sendemail.php");
            exit();
        } else { 
            header("Location: contact.html");
            exit();
        }
      
   }else{
        header("Location: contact.html");
        exit();
   }
?>