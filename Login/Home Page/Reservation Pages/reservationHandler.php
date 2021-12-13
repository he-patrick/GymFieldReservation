<?php
    $reservationDate = $_POST["reserveDate"];
    $reservationTime = $_POST["timeSelection"];
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $area = $_POST["ReservationArea"];
    echo $area;
/*
    $to      = 'phe1@ocdsb.ca';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: phe1@ocdsb.ca'       . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);*/
?>