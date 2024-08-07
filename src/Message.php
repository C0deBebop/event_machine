<?php

require '../lib/database.php';

class Message {
    protected $db;

    function __construct($db){
        $this->db=$db;
    }

    public function get_all_messages($user_data){
        $data = [];
        $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
        $friends = $this->get_friend_messages($user_data);
        $query = "";
        $comma = ' ';
        foreach($friends as $key => $value) :          
            $query .= "SELECT users.name, profile.image, profile.user_id ,messages.message_id, messages.subject, messages.message, messages.message_status, messages.message_date 
                        FROM users LEFT JOIN profile ON profile.user_id=users.id LEFT JOIN messages ON messages.sender_id=profile.user_id 
                        WHERE users.id=" . $mysqli->real_escape_string($value[strlen($value) - 2]) . ";";
            $comma = ', ';
        endforeach;
        if($mysqli->multi_query($query)){
        do {
            if($result = $mysqli->use_result()){
                while($row = $result->fetch_all(MYSQLI_ASSOC)){
                    array_push($data, $row);
                }
                $result->close();
            }
        } while($mysqli->next_result());
     } 
     return $data;
   } 

   private function get_friend_messages($user_id){
        $users = [];
        $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
        $stmt = $mysqli->prepare("SELECT * FROM messages WHERE recipient_id=?");
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $results = $stmt->get_result();
        foreach($results as $row) {
            $ids = json_encode(array('id' => $row['sender_id']));
            array_push($users,  $ids);        
        }
        return $users;
    }

   public function get_message($message_id){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->database);
       $stmt = $mysqli->prepare("SELECT * from message WHERE message_id=?");
       $stmt->bind_param('s', $message_id);
       $stmt->execute();
       $stmt->close();
   }
   
   public function send_message($message_data){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->database);
       $stmt = $mysqli->prepare("INSERT INTO message (subject, message, message_date, sender_id, recipient_id) VALUES(?, ?, ?, ?, ?)");  
       $formatted_date = new DateTime('now');
       $formatted_message_date = $formatted_date->format('Y-m-d');
       $stmt->bind_param('sssss', $message_data['subject'], $message_data['message'], $formatted_message_date, $message_data['sender_id'], $message_data['recipient_id']);
       $stmt->execute();
       $stmt->close();
   }

   public function delete_message($message_id){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
       $stmt = $mysqli->prepare("DELETE FROM messages WHERE message_id=?");
       $stmt->bind_param('s', $message_id);
       $stmt->execute();
       $stmt->close();
   }

   public function delete_all_messages($user_id){
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
       $stmt = $mysqli->prepare("DELETE FROM messages WHERE recipient_id=?");
       $stmt->bind_param('s', $user_id);
       $stmt->execute();
       $stmt->close();
   }
}

?>