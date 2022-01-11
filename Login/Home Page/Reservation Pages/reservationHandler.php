
<?php

//Try this one later
//header('Location: HalfMainGym2.html');

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservationdb";

$conn = new mysqli($servername, $username, $password, $dbname);
$reservationDate = $_POST["reservation"];
$reservationTime = $_POST["times"];
$area = $_POST["ReservationArea"];
$result = mysqli_query($conn, "SELECT * FROM reservationdb WHERE ReservationTime = $reservationTime AND ReservationDate = $reservationDate AND Area = $area");
if($result == 0) {
     // row not found, do stuff...
     $firstName = $_POST["fname"];
     $lastName = $_POST["lname"];
     $email = $_POST["email"];
     $sql = "INSERT INTO reservationdb (ReservationDate, ReservationTime, FirstName, LastName, Email, Area) VALUES ('$reservationDate', '$reservationTime', '$firstName', '$lastName', '$email', '$area')";
     mysqli_query($conn, $sql) or die('Error, insert query failed');
     if($conn->query($sql) == TRUE){
         echo "Successfully Booked";
     }
} else {
    // do other stuff...
    echo "failed";
}
$conn->close();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->isSMTP();
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output                                          //Send using SMTP
  $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'gymfieldbooking@gmail.com';                     //SMTP username
  $mail->Password   = 'earlofmarchss';                               //SMTP password
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAutoTLS = false;            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('gymfieldbooking@gmail.com', 'GymFieldBooking', 0);
  $mail->addAddress('phe1@ocdsb.ca', 'Patrick');     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="0;url=HalfMainField2.html">
</html>
