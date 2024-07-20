<?php
include '../includes/header.php';
require '../src/Event.php'; 


$event_data = array(
    'country' => 'Belize',
    'id' => 1
);

$db = new Database('host', 'username', 'password', 'database');
$events = new Event($db);
$event = $events->update($event_data);








?>