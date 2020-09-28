<?php
    
    require_once('../../controller/login.php');
    // SET HEADER
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");

    $login = new LoginController();

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $data = $login->login($_POST['email'], $_POST['password']);

    }else{
        $data = "Unable to login";
    }
    echo $data;
?>