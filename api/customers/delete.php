<?php
    // SET HEADER
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-POSTed-With");
        
    require_once('../../controller/customer.php');

    $customer = new CustomerController();
    // GET DATA FORM POST
    // $input = json_decode(file_get_contents('php://input'), true);

    // $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        // Delete
        $delete = $customer->delete_customer($id);
        echo $delete;

    }else{
        echo "Nothing has been deleted on the table";
    }

?>