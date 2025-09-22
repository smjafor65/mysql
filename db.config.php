<?php
// Database connection settings
$host = "localhost";    // সাধারণত localhost
$user = "root";         // XAMPP default
$pass = "";             // XAMPP default password (empty)
$db   = "batch66";   // তুমি যে ডাটাবেস ব্যবহার করবে

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
