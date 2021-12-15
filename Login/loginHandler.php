<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";
$conn = new mysqli($servername, $username, $password, $dbname);

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
