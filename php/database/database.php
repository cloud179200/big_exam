<?php
include "./shared/debug_to_console.php";
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbName = "webbigexamproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
?>