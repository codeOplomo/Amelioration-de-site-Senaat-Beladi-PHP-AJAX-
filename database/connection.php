<?php
$servername = "localhost"; // Change this to your database server name if it's different
$username = "root";
$password = "";
$dbname = "senaat_beladi_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); }
//else {
//     echo "Connected successfully";
// }
?>