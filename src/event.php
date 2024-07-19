<?php

require '../lib/database.php';

class Event {

    protected $db;

    function __construct($db){
         $this->db =$db;
    }
   
   public function add($event_data){
      $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
      $stmt = $mysqli->prepare("INSERT INTO events (name, headline, description, venue, city, state, country, address, image, start_date, end_date, start_time, end_time, occurrence, user_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
      $start_date_string = strtotime($event_data['start_date']);
      $end_date_string = strtotime($event_data['end_date']);
      $start_time_string = strtotime($event_data['start_time']);
      $end_time_string = strtotime($event_data['end_time']);
      $formatted_start_date = date('Y-m-d', $start_date_string);
      $formatted_end_date = date('Y-m-d', $end_date_string);
      $formatted_start_time = date('H:i:s', $start_time_string);
      $formatted_end_time = date('H:i:s', $end_time_string);
      $stmt->bind_param('sssssssssssssss',
                          $event_data['name'],
                          $event_data['headline'], 
                          $event_data['description'],
                          $event_data['venue'], 
                          $event_data['city'], 
                          $event_data['state'], 
                          $event_data['country'], 
                          $event_data['address'], 
                          $event_data['event-image'],
                          $formatted_start_date,
                          $formatted_end_date, 
                          $formatted_start_time, 
                          $formatted_end_time, 
                          $event_data['occurrence'], 
                          $event_data['id']);
      $stmt->execute();
      $stmt->close();
   }

   public function update($event_id){

   }

   public function delete($event_id){

   }

   public function get_all_events(){
     //get all events for Event Machine
   }

   public function get_event($event_id) {

   }


   


}



?>