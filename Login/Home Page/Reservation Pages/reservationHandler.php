
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
   
    require("/home/site/libs/PHPMailer-master/src/PHPMailer.php");
    require("/home/site/libs/PHPMailer-master/src/SMTP.php");
  
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP(); // enable SMTP
  
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465; // or 587
      $mail->IsHTML(true);
      $mail->Username = "phetheep@gmail.com";
      $mail->Password = "Phe6596508886";
      $mail->SetFrom("phetheep@gmail.com");
      $mail->Subject = "Test";
      $mail->Body = "hello";
      $mail->AddAddress("phetheep@gmail.com");
  
       if(!$mail->Send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
       } else {
          echo "Message has been sent";
       }
  ?>