<?php
include("../php/shared/debug_to_console.php");

$servername = "localhost";
$username = "root";
$password = "12345678";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  debug_to_console("Connection failed: " . $conn->connect_error);
}
debug_to_console($conn->connection_status);
