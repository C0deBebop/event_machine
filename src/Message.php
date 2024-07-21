<?php

require '../lib/database.php';

class Message {

    protected $db;

    function __construct($db){
        $this->db=$db;
    }

   function get_all_messages($user_id){
        $mysqli = new mysqli($this->db-host, $this->db->username, $this->db->password, $this->db->database);
        $stmt = $mysqli->prepare("SELECT * FROM messages WHERE recipient_id=?");
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $stmt->close();
   }
   

   function get_message($message_id){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->database);
       $stmt = $mysqli->prepare("SELECT * from message WHERE message_id=?");
       $stmt->bind_param('s', $message_id);
       $stmt->execute();
       $stmt->close();
   }
   
   function send_message($message_data){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->database);
       $stmt = $mysqli->prepare("INSERT INTO message (subject, message, message_date, sender_id, recipient_id) VALUES(?, ?, ?, ?, ?)");  
       $formatted_date = new DateTime('now');
       $formatted_message_date = $formatted_date->format('Y-m-d');
       $stmt->bind_param('sssss', $message_data['subject'], $message_data['message'], $formatted_message_date, $message_data['sender_id'], $message_data['recipient_id']);
       $stmt->execute();
       $stmt->close();
   }

   function delete_message($message_id){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
       $stmt = $mysqli->prepare("DELETE FROM messages WHERE message_id=?");
       $stmt->bind_param('s', $message_id);
       $stmt->execute();
       $stmt->close();
   }

   function delete_all_messages($user_id){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
       $stmt = $mysqli->prepare("DELETE FROM messages WHERE recipient_id=?");
       $stmt->bind_param('s', $user_id);
       $stmt->execute();
       $stmt->close();
   }

}


?>