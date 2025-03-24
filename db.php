<?php
$host = "localhost";
$user = "root"; // Change if needed
$password = ""; // Your MySQL password
$database = "art_gallery"; // Your database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>