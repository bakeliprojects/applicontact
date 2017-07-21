<?php



public function getConnection(){
    $password = "";
    $host = "localhost";
    $db = "applicontact";
    $username = "root";
    $connection = new PDO("mysql:dbname=$db;host=$host", $username,$password);
    
    
}


?>