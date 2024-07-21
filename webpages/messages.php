<?php
include '../includes/header.php';
require '../src/Message.php';

$db = new Database('host', 'username', 'password', 'database');
$messages = new Message($db);





?>