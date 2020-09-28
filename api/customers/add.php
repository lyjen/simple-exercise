<?php
    // SET HEADER
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        
    require_once('../../controller/customer.php');

    $customer = new CustomerController();
    // GET DATA FORM REQUEST
    // $input = json_decode(file_get_contents('php://input'), true);

    // $method = $_SERVER['REQUEST_METHOD'];

    if(isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($_POST['username'])){
            # ASSIGN USERNAME
            $username = $customer->next_username();
            $password = "password";
        }

        if(isset($_POST['status'])){
            $status = 1;
        }else{
            $status = 0;
        }

        $data['username'] = $username;
        $data['password'] = $password;
        $data['email'] = $_POST['email'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['address'] = $_POST['address'];
        $data['is_active'] = $status;

        // Add customer
        $add = $customer->add_customer($data);
        echo $add;

    }else{
        echo "Nothing has been added on the table";
    }

?>