<?php

class Database {
    public $host;
    public $username;
    public $password;
    public $database;

    public function __construct($host, $username, $password, $database){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    
}


?>