<?php
$servername = "localhost"; // Typically 'localhost' or an IP address
$username = "root";        // Your MySQL username (default is 'root')
$password = "";            // Your MySQL password (default is empty for localhost)
$dbname = "bima_insurances"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
