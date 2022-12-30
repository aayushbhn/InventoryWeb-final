<?php

$conn = mysqli_connect('localhost','root','','user_db');
if ($conn->connect_error) {
    die("connection Failed : " . $conn->connect_error);
}

?>

