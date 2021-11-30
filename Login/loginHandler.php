<?php
if(isset($_POST['username'])){
    $uname = $_POST['username'];
}
if(isset($_POST['password'])){
    $pword = $_POST['password'];
}
if (strcmp($uname, 'megan.port@ocdsb.ca') !== 0 || strcmp($pword, 'earlathletics') !== 0) {
	// Correct username and password, logged in	
  echo 'Incorrect username and/or password!';
} else {
    // Incorrect password
    echo 'welcome!';
}
?>