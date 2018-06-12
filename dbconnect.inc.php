<?php
$servername = "160.153.147.26";
$username = "dbwjk339grnc";
$password = "yCEf5kck=I?*7";
$database = "iconhistory";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>