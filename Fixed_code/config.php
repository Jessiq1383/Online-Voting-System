<?php

// phpmyadmin settings + the database name from mysql script file
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "website_voting";
$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
	die("connection failed:" .$conn->connect_error);

}

// if the echo text appeared, it means that the connection work
// 




?>