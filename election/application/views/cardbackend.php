<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";

// Create connection
$conn = new mysqli($servername, $username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


$sql = "SELECT * FROM votes";
$result = $conn->query($sql);

print_r($result->fetch_assoc());


mysqli_close($conn);




?>