<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginDB";
$uname = $_GET["username"];
$pcode = $_GET["passcode"];

// Create connection
$conn = new mysqli($servername, $username, $passcode, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO loginInfo (username, passcode)
VALUES ($uname, $pcode)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>