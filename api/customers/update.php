<?php
    // SET HEADER
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    // header("Access-Control-Allow-Methods: PUT");
    // POST for a while
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once('../../controller/customer.php');

    $customer = new CustomerController();
    // GET DATA FORM REQUEST
    // $input = json_decode(file_get_contents('php://input'), true);
    // echo $_SERVER['REQUEST_METHOD'];

    $data = array();

    if(isset($_POST['id']))
    {
        $data['id'] = $_POST['id']; 
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['address'] = $_POST['address'];
        $data['is_active'] = $_POST['status'];

        // Update customer
        $update = $customer->update_customer($data);
        echo $update;

    }else{
        echo "Nothing has been updated on the table.";
    }

?>