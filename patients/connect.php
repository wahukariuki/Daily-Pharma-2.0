<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dailypharma2";

//create connection 
$conn= new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Error");
}
$conn->set_charset("utf8");
?>