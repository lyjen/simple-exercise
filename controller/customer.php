<?php

require_once('../../model/customer.php');
		
class CustomerController{

	private $customer;

	public function __construct(){
		// parent::__construct();
		$this->customer = new Customer();
	}

	function get_customers() {	

		$data = $this->customer->getCustomers();
	
		// if(empty($data)) {
		// 	$statusCode = 404;
		// } else {
		// 	$statusCode = 200;
		// 	// need to some tweak here
		// }

		$result["data"] = $data;
		$result['status'] = "ok";
		return json_encode($result);
	}

	function get_customer($id) {	

		$data = $this->customer->getCustomer($id);

		$result["data"] = $data;
		$result['status'] = "ok";
		return json_encode($result);
	}

	function next_username() {	

		$data = $this->customer->get_next_username();
		$count = $data[0]['count'] + 1;
		$username = "no_username". $count;
		return $username;
	}

	function add_customer($data){

		$result = array();

		if(empty($data)){
			$result['message'] = "No data found.";
			$result['status'] = "failed";
		}else{
			// Validate Data

			$add = $this->customer->addcustomer($data);
	
			if($add){
				$message = "Customer has been added successfully.";
			}else{
				$message = "Failed to add customer.";
			}
			
			$result['message'] = $message;
			$result['status'] = "ok";
		}
		return json_encode($result);
	}

	function update_customer($data){

		$result = array();

		if(empty($data)){
			$result['message'] = "No data found.";
			$result['status'] = "failed";
		}else{
			// Validate Data
			# CHECK IF USERNAME OR EMAIL ALREADY EXIST FROM OTHER DATA
			$check = $this->customer->validate_username_email($data['id'], $data['username'], $data['email']);

			if($check['count'] >= 1){
				$result['message'] = "Username or Email Address already exist";
				$result['status'] = "failed";
				return json_encode($result);
			}

			$update = $this->customer->updateCustomer($data);

			if($update){
				$message = "Customer has been updated successfully.";
			}else{
				$message = "Failed to update customer.";
			}

			$result['message'] = $message;
			$result['status'] = "ok";
		}
		return json_encode($result);
	}

	function delete_customer($id){

		$result = array();

		if($id){

			$delete = $this->customer->deleteCustomer($id);

			if($delete){
				$message = "Customer has been deleted successfully.";
			}else{
				$message = "Failed to delete customer.";
			}

			$result['message'] = $message;
			$result['status'] = "ok";
		}else{
			$result['message'] = "No ID found.";
			$result['status'] = "failed";
		}

		return json_encode($result);
	}

}

?>