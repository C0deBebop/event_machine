<?php

require '../lib/database.php';

class Message {

    protected $db;

    function __construct($db){
        $this->db=$db;
    }

   function get_all_messages($user_id){
        $mysqli = new mysqli($this->db-host, $this->db->username, $this->db->password, $this->db->database);
        $stmt = $mysqli->prepare("SELECT * FROM messages where recipient_id=?");
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $stmt->close();
   }
   

   function get_message($message_id){

   }
   
   function send_message($message_data){

   }

   function delete_message($message_id){

   }

   function delete_all_messages($user_id){

   }


}


?>