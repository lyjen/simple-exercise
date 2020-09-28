<?php

require_once('../../model/user.php');
		
class LoginController{

	private $user;

	public function __construct(){
		// parent::__construct();
		$this->user = new User();
	}

	function login($email, $password) {

		$data = $this->user->login($email, $password);
		$status = "failed";
		if($data){
			$status = "ok";
		}
		
		
        $result["data"] = $data;
		$result['status'] = $status;
		return json_encode($result);
    }

    function logout(){
        return $this->user->logout();
    }
}