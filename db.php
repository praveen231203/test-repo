<?php
$servername = "127.0.0.1"; // or use "localhost"
$username = "root";
$password = ""; // Default XAMPP MySQL password is empty
$database = "art_gallery";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
