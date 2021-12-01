<?php

session_start();
$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "";
$DATABASE_NAME = "reservationDB";

// Create connection
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PAS, $DATABASE_NAME);
// Check connection
if (mysqli_connect_errno()) {
  exit("Connection failed: " . mysqli_connect_error());
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