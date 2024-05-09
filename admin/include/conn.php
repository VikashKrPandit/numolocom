<?php 

$servername = "localhost";
$username = "root";
$password = "Numolo@12345";
$db = "numolo";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

// Purchase Code 
//$pur_code = "xxxxx-xxxxxxxxxx-xxxxxxxxxx";
$pur_code = "6f29d56f-1cb4-4a70-baf2-072aed7aaefb";


?>