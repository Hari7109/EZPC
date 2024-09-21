<?php
$host = 'localhost'; 
$db   = 'ezpc';   
$user = 'root';      
$pass = '';          

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);


if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
?>