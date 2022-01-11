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
  $result = mysqli_query($conn, "SELECT * FROM reservationinfo WHERE ReservationTime = '$reservationTime' AND ReservationDate = '$reservationDate' AND Area = '$area'");
  if(mysqli_num_rows($result) == 0) {
       // row not found, do stuff...
       $eventName = $_POST["fname"];
       $lastName = $_POST["lname"];
       $email = $_POST["email"];
       $sql = "INSERT INTO reservationinfo (ReservationDate, ReservationTime, eventName, LastName, Email, Area) VALUES ('$reservationDate', '$reservationTime', '$eventName', '$lastName', '$email', '$area')";
       mysqli_query($conn, $sql) or die('Error, insert query failed');
       $_SESSION["success"] = 'Successfully Booked';
  } else {
      // do other stuff...
      $_SESSION["success"] = 'Booking Failed';
  }
  header('Location:'.$area.'.php');
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
    $mail->addAddress('$email', '$lastName');     //Add a recipient

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $eventName.'Successfully Booked!';
    $mail->Body    = 'You successfully booked an Gym/Field on '.$date.' at '.$time;
    $mail->send();
} catch (Exception $e) {
    $hi = "hi";
}

?>