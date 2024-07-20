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

   public function update($event_data){
     $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);   
     $columns = array('name', 'headline', 'description', 'venue', 'city', 'state', 'country', 'address', 'image', 'start_date', 'end_date', 'start_time', 'end_time', 'occurrence');
     $query = "UPDATE events SET";
     $comma = ' ';
     foreach($event_data as $key => $value){
          if(!empty($value) && in_array($key, $columns)) {
              $query .= $comma . $key . " = '" . $mysqli->real_escape_string(trim($value)) . "' WHERE event_id=" . $event_data['id'];
              $comma = ", ";
          }
     }
     $mysqli->query($query);
   }

   public function delete($event_id){
     $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
     $stmt = $mysqli->prepare("DELETE FROM events WHERE event_id=?");
     $stmt->bind_param('s', $event_id);
     $stmt->execute();
     $stmt->close(); 
   }

   public function get_all_events(){
     //get all events for Event Machine
     $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
     $result = $mysqli->query("SELECT * FROM events");
     $rows = $result->fetch_all(MYSQLI_ASSOC);
     return $rows; 
   }

   public function get_event($event_id) {
      $mysqli = new mysqli($this->db->host, $this->db->username, $this->db->password, $this->db->database);
      $stmt = $mysqli->prepare("SELECT name, headline, description, venue, city, state, country, address, image, start_date, end_date, start_time, end_time, occurrence, user_id FROM events WHERE event_id=?");
      $stmt->bind_param('s', $event_id);
      $stmt->execute();
      $stmt->bind_result($name, $headline, $description, $venue, $city, $state, $country, $address, $image, $start_date, $end_date, $start_time, $end_time, $occurrence, $user_id);
      $stmt->fetch(); 
      return array (
        'name' => $name,
        'headline' => $headline,
        'description' => $description,
        'venue' => $venue,
        'city' => $city,
        'state' => $state,
        'country' => $country,
        'address' => $address,
        'image' => $image,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'occurrence' => $occurrence,
        'user_id' => $user_id,
      );
 }

}



?>