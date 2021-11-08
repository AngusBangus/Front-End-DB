<?php

$dbServerName = 'localhost:3306'; //specify the port number 3307 where the phpmyadmin listen to
$user = 'root';
$pass = '';
$db = 'testbd';

// create connection
$conn = new mysqli($dbServerName, $user, $pass, $db);



// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>