
<?php
  
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservationdb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $reservationDate = $_POST["reservation"];
    $reservationTime = $_POST["times"];
    $area = $_POST["ReservationArea"];
    $result = $conn->query("SELECT * FROM reservationdb WHERE ReservationTime = $reservationTime AND ReservationDate = $reservationDate AND Area = $area");
    if($result == FALSE) {
         // row not found, do stuff...
         $firstName = $_POST["fname"];
         $lastName = $_POST["lname"];
         $email = $_POST["email"];
         $sql = "INSERT INTO reservationdb (ReservationDate, ReservationTime, FirstName, LastName, Email, Area) VALUES ('$reservationDate', '$reservationTime', '$firstName', '$lastName', '$email', '$area')";
         mysqli_query($conn, $sql) or die('Error, insert query failed');
         if($conn->query($sql) == TRUE){
             echo "Successfully Booked";
         }
         $conn->close();
    } else {
        // do other stuff...
        echo "failed";
        $conn->close();
    }
   
use PHPMailer;
use SMTP;
use Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

//Send mail using gmail
if($send_using_gmail){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "your-gmail-account@gmail.com"; // GMAIL username
    $mail->Password = "your-gmail-password"; // GMAIL password
}

//Typical mail data
$mail->AddAddress($email, $name);
$mail->SetFrom($email_from, $name_from);
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}
?>