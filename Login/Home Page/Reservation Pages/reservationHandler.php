<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservationdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $reservationDate = $_POST["reservation"];
    $reservationTime = $_POST["times"];
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $area = $_POST["ReservationArea"];
    $sql = "INSERT INTO reservationinfo (ReservationDate, ReservationTime, FirstName, LastName, Email, Area) VALUES ('$reservationDate', '$reservationTime', '$firstName', '$lastName', '$email', '$area')";
    mysqli_query($conn, $sql) or die('Error, insert query failed');
    if($conn->query($sql) == TRUE){
        echo "Successfully Booked";
    }
    $conn->close();
    /*
    $to      = 'phe1@ocdsb.ca';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: phe1@ocdsb.ca'       . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);*/
?>