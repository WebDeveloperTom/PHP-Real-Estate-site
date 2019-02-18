<?php

$host = 'localhost'; //location of clients DB
$user ='root'; //default
$dbPass ='';
$db ='assignment_7'; // database name
$conn = new mysqli($host, $user, $dbPass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected";

 ?>
