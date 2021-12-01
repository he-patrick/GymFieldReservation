<?php
    $to      = 'phe1@ocdsb.ca';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: phe1@ocdsb.ca'       . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
?>