<?php


class Cache {
    public function redis(){
        $redis = new Redis();
        $redis->connect('localhost', 6379);
    }
}




?>