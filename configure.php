<?php
use LDAP\Result;

$servername = "localhost";
$username = "root";
$password = "";
$database = "user_db";

//crate connection 
$mysqli = new mysqli($servername, $username, $password, $database);
if ($mysqli->errno)
    die("Connection Failed" . $mysqli->connect_error);
?>