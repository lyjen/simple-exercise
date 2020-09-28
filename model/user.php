<?php

    require_once('../../library/db.php');
    session_start(); 

    Class User extends DB{

        private $db = array();

        public function __construct(){

            $this->db = new DB();
        }

        public function login($email, $password){

            $query = "SELECT * FROM account WHERE (email='".$email."' OR username='".$email."') 
            AND password='".md5($password)."'";
            $user = $this->db->execute_select($query);
            if($user){
  
                $_SESSION['id'] = $user[0]['account_id'];
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['login'] = TRUE;	
                return $user;
            }
            return FALSE;

        }

        function logout(){
            session_destroy();
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            return;
        }

    }

?>