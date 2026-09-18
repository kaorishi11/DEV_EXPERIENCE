<?php
$hostname = "localhost";
$password = "";
$database = "ceon";
$username = "root";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>