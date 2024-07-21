<?php

require '../lib/database.php';

class User {
    protected $db;

    public function __construct($db){
        $this->db = $db;
    }
    
    public function secure_user_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function create_user_account($name, $email, $password){
        $hashed_password = $this->secure_user_password($password);
        $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
        $stmt = $mysqli->prepare("INSERT INTO users (name, email, password, date_added) VALUES(?, ?, ?, ?)");
        $current_date = new DateTime('now');
        $formatted_date = $current_date->format('Y-m-d');
        $stmt->bind_param('ssss', $name, $email, $hashed_password, $formatted_date);
        $stmt->execute();
        $stmt->close();  
    }

    public function check_user_account($email, $password){
       $mysqli  = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
       $stmt = $mysqli->prepare("SELECT id, name, email, password FROM users WHERE email=?");
       $stmt->bind_param('s', $email); 
       $stmt->execute();
       $stmt->bind_result($id, $name, $check_email, $user_password);
       $stmt->fetch();
       if($check_email && password_verify($password, $user_password)){
            return $this->get_user_account($id, $name, $email);
       } else {
            echo 'Email does not exist';
       }
    } 

    private function get_user_account($id, $name, $email){
        return [$id, $name, $email];
    }

/*
    function deactive_account() {

    }



    function update_account(){

    }
*/


}


?>