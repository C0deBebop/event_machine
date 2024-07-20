<?php

include '../includes/header.php';
require '../src/Event.php';
session_start();

$url = $_SERVER['REQUEST_URI'];
$id = $url[-1];
echo $id;
$db = new Database('host', 'username', 'password', 'database');
$events = new Event($db);
$event = $events->get_event($id);
 foreach($event as $key => $value){
     echo "$key : $value <br>";
 }




include '../includes/footer.php'
?>