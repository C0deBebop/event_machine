<?php

include '../includes/header.php';
require '../src/Event.php';
session_start();

$db = new Database('host', 'username', 'password', 'database');
$events = new Event($db);
$rows = $events->get_all_events();

foreach($rows as $row) {
    echo $row['name'];
}



include '../includes/footer.php'
?>