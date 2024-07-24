<?php


class Friend {
    protected $db;

    public function __construct($db){
       $this->db = $db;
    }

    public function get_all_friends($friend_id){
      //get all your friends
      $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
      //$stmt = $mysqli->prepare("SELECT friends.friend_id, users.name, profile.user_id FROM friends WHERE user_id=?");

    }

    public function get_friend($user_id, $friend_id){
        //get selected friend
        $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
       // $stmt = $mysqli->prepare("");
    }

    public function add_friend($user_id, $friend_id){
       //add to your friend list
       $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
       $stmt = $mysqli->prepare("INSERT INTO friends (user_id, friend_id) VALUES(?, ?)");
       $stmt->bind_param('ss', $user_id, $friend_id);
       $stmt->execute();
       $stmt->close();
    }

    public function block_friend(){
      //Block a friend
    }





}


?>