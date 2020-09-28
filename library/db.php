<?php

require_once('../../config/database.php');

class DB{

	private $host = DBHOST;
	private $user = DBUSER;
	private $password = DBPASS;
	private $database = DBNAME;
    
    public $connection;
	public $data;

	function __construct() {
		$conn = $this->connect_db();
		if(!empty($conn)) {
			$this->connection = $conn;			
		}
	}

	function connect_db() {
		$conn = new mysqli($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function execute_select($query) {

		$result = $this->connection->query($query);
		$num_result = $result->num_rows;

		if($num_result){

			while($rows=$result->fetch_assoc()){
				$this->data[]=$rows;
				//print_r($rows);
			}
						
			return $this->data;
		}
	
	}

	function execute_select_one($query) {

		$result = $this->connection->query($query);
		$num_result = $result->num_rows;
		return $result->fetch_assoc();
		// if($num_result){
			
		// 	while($rows=$result->fetch_assoc()){
		// 		$this->data[]=$rows;
		// 		//print_r($rows);
		// 	}
 						
		// 	return $this->data[1];
		// }
	
	}

	function execute_query($query) {

		$result = $this->connection->query($query) or die(mysqli_connect_errno()."Cannot proceed");
	
        if (!$result) {

            if($this->connection == 1062) {
                return false;
            } else {
                trigger_error (mysqli_error($conn),E_USER_NOTICE);
				
            }
		}
		
        $affected_rows = $this->connection->affected_rows;
		return $affected_rows;
		
    }
 
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
	}
	
}

?>
