<?php

    require_once('../../controller/customer.php');
    // SET HEADER
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");

    $customer = new CustomerController();

    if(isset($_GET['id']))
    {
        $data = $customer->get_customer($_GET['id']);
    }else{
        $data = $customer->get_customers();
    }
    echo $data;
?>