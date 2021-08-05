<?php 

function connect(){  
$conn = new mysqli("localhost", "d-w", "3402", "digital-wallet");

if ($conn->connect_errno){
	die("Database connection failed ..." . $conn->connect_error);
}
return $conn;
}
?>