<?php

    require_once('../../library/db.php');

    Class Customer extends DB{

        private $db = array();

        public function __construct(){

            $this->db = new DB();
        }

        public function getCustomers(){

            $query = "SELECT a.account_id as id, CONCAT(first_name, ' ', last_name) as name, a.* FROM account a LEFT JOIN account_role ar ON a.account_id = ar.account_id WHERE ar.role_id !=1";
            $customers = $this->db->execute_select($query);
            return $customers;

        }

        public function getCustomer($id){

            $query = "SELECT a.account_id as id, CONCAT(first_name, ' ', last_name) as name, a.* FROM account a LEFT JOIN account_role ar ON a.account_id = ar.account_id WHERE a.account_id=".$id;
            $user = $this->db->execute_select_one($query);
            return $user;

        }
        public function validate_username_email($id, $username, $email){
            $query = "SELECT COUNT(*) as count FROM account WHERE (username='".$username."' OR email='".$email."') AND account_id !=".$id;

            $user = $this->db->execute_select_one($query);
            return $user;
        }

        public function get_next_username(){

            $query = "SELECT COUNT(*) as count FROM account WHERE username LIKE '%no_username%'";
            $count = $this->db->execute_select($query);
            return $count;

        }

        public function addCustomer($data){
            

            $query = "INSERT into account values
                    ('', '".$this->db->escape_string($data['username'])."',
                    '".$this->db->escape_string(md5($data['password']))."',
                    '".$this->db->escape_string($data['first_name'])."',
                    '".$this->db->escape_string($data['last_name'])."',
                    '".$this->db->escape_string($data['email'])."',
                    '".$this->db->escape_string($data['address'])."',
                    '".$this->db->escape_string($data['is_active'])."', NOW(),'')";

            $result = $this->db->execute_query($query);
            
            if($result){
                $query = "SELECT * FROM account WHERE email='".$data['email']."'";

                $customer = $this->db->execute_select_one($query);

                $account_id = $customer['account_id'];

                // Add Role
                $query = "INSERT into account_role values ('".$account_id."', 2)";
                $res = $this->db->execute_query($query);
                if($res){
                    return 1;
                }
            }

            return 0;
        }

        public function updateCustomer($data){
            
            $query = "UPDATE account SET username='".$this->db->escape_string($data['username'])."',
                     email='".$this->db->escape_string($data['email'])."', 
                      first_name='".$this->db->escape_string($data['first_name'])."',
                      last_name='".$this->db->escape_string($data['last_name'])."', 
                      address='".$this->db->escape_string($data['address'])."', 
                      is_active='".$this->db->escape_string($data['is_active'])."', update_time= NOW()
                        WHERE account_id=".$this->db->escape_string($data['id']);

            $result = $this->db->execute_query($query);

            if($result){
                return 1;
            }

            return 0;
        }

        // public function deactivateCustomer($id){
           
        //     $query = "UPDATE account SET is_active=0, update_time= NOW()
        //                 WHERE account_id=".$id;

        //     $result = $this->db->execute_query($query);

        //     if($result){
        //         return 1;
        //     }

        //     return 0;
        // }

        // public function activateCustomer($id){
           
        //     $query = "UPDATE account SET is_active=1, update_time= NOW()
        //                 WHERE account_id=".$id;

        //     $result = $this->db->execute_query($query);

        //     if($result){
        //         return 1;
        //     }

        //     return 0;
        // }

        public function deleteCustomer($id){
            //Cascade is not yet working, please check table constraint
            $query = "DELETE FROM account WHERE account_id=".$id;

            $result = $this->db->execute_query($query);

            if($result){
                return 1;
            }

            return 0;
        }

    }

?>