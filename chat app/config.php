<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connection makhdamach". $conn->connect_error);
}
?>