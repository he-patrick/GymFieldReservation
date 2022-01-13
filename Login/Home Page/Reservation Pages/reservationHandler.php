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
    $mail->addAddress($email, $lastName);     //Add a recipient

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Confirmation: Successfully Booked!';
    $mail->Body    = 'You successfully booked a reservation at '.$area.' at '.$reservationTime;
    $mail->send();
} catch (Exception $e) {
    $hi = "hi";
}

require __DIR__ . '/vendor/autoload.php';

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->addScope("https://www.googleapis.com/auth/calendar.events");
    $client->addScope("https://www.googleapis.com/auth/calendar");
    $client->setAuthConfig(__DIR__.'/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);

/*
$calendarList = $service->calendarList->listCalendarList();

while(true) {
  foreach ($calendarList->getItems() as $calendarListEntry) {
    echo $calendarListEntry->getID();
    echo ' '.$calendarListEntry->getSummary();
    echo '<br>';
  }
  $pageToken = $calendarList->getNextPageToken();
  if ($pageToken) {
    $optParams = array('pageToken' => $pageToken);
    $calendarList = $service->calendarList->listCalendarList($optParams);
  } else {
    break;
  }
}
printf('<br>');
/*
v885bcj2gf1umeqrbo22ivuab0@group.calendar.google.com Upper Field
viuaut6rjmkpjqonjjpks3cbvc@group.calendar.google.com Upper Gym
en-gb.canadian#holiday@group.v.calendar.google.com Holidays in Canada
gymfieldbooking@gmail.com gymfieldbooking@gmail.com
2gaciuumdp4chavc5or93mv0a0@group.calendar.google.com 1/2 Main Gym
e4247g44bv99r321uv1mo2nrr8@group.calendar.google.com 1/2 Main Gym
tpnr7a7k341egsqlbbjckpcf2s@group.calendar.google.com HalfMainField1
mtdr7gkss1p972csl4e4s5bpno@group.calendar.google.com HalfMainField2
ditb68kr9am9ehi9rl1j0a6b58@group.calendar.google.com Intermediate Gym
*/
$calendarIds = array(
  "UpperField" => "v885bcj2gf1umeqrbo22ivuab0@group.calendar.google.com",
  "UpperGym" => "viuaut6rjmkpjqonjjpks3cbvc@group.calendar.google.com",
  "HalfMainGym1" => "2gaciuumdp4chavc5or93mv0a0@group.calendar.google.com",
  "HalfMainGym2" => "e4247g44bv99r321uv1mo2nrr8@group.calendar.google.com",
  "HalfMainField1" => "tpnr7a7k341egsqlbbjckpcf2s@group.calendar.google.com",
  "HalfMainField2" => "mtdr7gkss1p972csl4e4s5bpno@group.calendar.google.com",
  "IntermediateGym" => "ditb68kr9am9ehi9rl1j0a6b58@group.calendar.google.com"
);

// Print the next 10 events on the user's calendar.
$calendarId = $calendarIds[$area];
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => true,
  'timeMin' => date('c'),
);
$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();
echo $reservationTime.'<br>';
if($reservationTime == "3:00PM"){
    $reservationTime = '15:00:00';
    $reservationEnd = '16:00:00';
}
else if($reservationTime == "7:00AM"){
    $reservationTime = '07:00:00';
    $reservationEnd = '08:00:00';
}
else if($reservationTime == "4:00PM"){
    $reservationTime = '16:00:00';
    $reservationEnd = '17:00:00';
}
$tempTimeFinal = $reservationDate.' '.$reservationTime;
$datetime = date("Y-m-d\TH:i:s", strtotime($tempTimeFinal));
echo $datetime.'<br>';

$tempTimeEnd = $reservationDate.' '.$reservationEnd;
$endTime = date("Y-m-d\TH:i:s", strtotime($tempTimeEnd));
echo $endTime.'<br>';
$event = new Google_Service_Calendar_Event(array(
    'summary' => $eventName,
    'location' => $area,
    'description' => $eventName,
    'start' => array(
      'dateTime' => $datetime,
      'timeZone' => 'America/Toronto',
    ),
    'end' => array(
      'dateTime' => $endTime,
      'timeZone' => 'America/Toronto',
    ),

    'attendees' => array(
      array('email' => $email),
    ),
    'reminders' => array(
      'useDefault' => FALSE,
      'overrides' => array(
        array('method' => 'email', 'minutes' => 24 * 60),
        array('method' => 'popup', 'minutes' => 10),
      ),
    ),
  ));
$event = $service->events->insert($calendarId, $event);
printf('Event created: %s\n', $event->htmlLink);
if (empty($events)) {
    print "No upcoming events found.\n";
} else {
    print "Upcoming events:\n";
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }
        printf("%s (%s)\n", $event->getSummary(), $start);
    }
}
?>