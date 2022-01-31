<?php
session_start();
/*
Connect to the database information
server name -> default 'localhost'
username -> default 'root'
password -> empty
database name -> logindb (as designated)
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

//Connect to the database itself, using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

//MySQL query to select the username and password
$u = 'SELECT username, passcode FROM logininfo';
$result = mysqli_query($conn, $u);

//$_POST['username'] == $u && $_POST['passcode'] == $p
if (mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
  if($row['username'] == $_POST['username'] && $row['passcode'] == $_POST['passcode']){
    // Correct username and password, logged in	
    header('Location: Home Page/HomePage.html');
    die();
  }
	else {
    // Incorrect password
    $_SESSION["error"] = 'Incorrect username and/or password!';
    header('Location: loginPage.php');
  }
} 
$conn->close();
//$conn->close();

?>
