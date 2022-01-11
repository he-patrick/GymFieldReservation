<?php
session_set_cookie_params(0);
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<html>
  <body class="w3-white">
    <div class="w3-top">
      <div class="w3-bar w3-light-green" style="font-size: 18px">
        <a href="HomePage.html" class="w3-bar-item w3-button w3-wide"><em>GnF</em> Gym and Field Booking</a>
        
        <button onclick="document.getElementById('contactModal').style.display='block'" class="w3-bar-item w3-button w3-right">Contact</button>
        
            <!--Modal-->
            <div id="contactModal" class="w3-modal">
              <div class="w3-modal-content w3-card-4 w3-panel w3-sand" style="width: 40%;">
                  <div class="w3-container w3-section w3-center">
                    <span onclick="document.getElementById('contactModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <img src="Images/MsPort.png" alt="MsPort" style="width: 100%;height: 60%;">
                  </div>
                  <div class="w3-section w3-container w3-center">
                    <h2 class="w3-wide"><strong><em>Megan Port</em></strong></h2>
                    <h4><a href="mailto: megan.port@ocdsb.ca" style="color: blue;">megan.port@ocdsb.ca</span></a></h4>
                  </div>
              </div>
          </div>
        <div class="w3-dropdown-hover w3-right">
          <button class="w3-button">Gyms & Fields &#9660</button>
          <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="HalfMainField1.html" class="w3-bar-item w3-button">&#189 Main Gym 1</a>
            <a href="HalfMainField2.html" class="w3-bar-item w3-button">&#189 Main Gym 2</a>
            <a href="UpperGym.html" class="w3-bar-item w3-button">Upper Gym</a>
            <a href="IntermediateGym.html" class="w3-bar-item w3-button">Intermediate Gym</a>
            <a href="HalfMainField1.html" class="w3-bar-item w3-button">&#189 Main Field 1</a>
            <a href="HalfMainField2.html" class="w3-bar-item w3-button">&#189 Main Field 2</a>
            <a href="UpperField.html" class="w3-bar-item w3-button">Upper Field</a>
          </div>
        </div>
      </div>
    </div>
    </div>
<br><br>

<div class="w3-container w3-pale-blue">
  <h1>&#189 Main Field #1</h1>
  <p>Please Enter Your Reservation Here</p>
  <div class="w3-col s8">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FToronto&showTitle=0&showCalendars=1&mode=WEEK&src=Z3ltZmllbGRib29raW5nQGdtYWlsLmNvbQ&src=dHBucjdhN2szNDFlZ3NxbGJiamNrcGNmMnNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23039BE5&color=%23B39DDB" style="border:solid 1px #777; width: 100%; height: 600px;"></iframe>
  </div>
  <div class="w3-container w3-col s4">
    <table>
      <form action="reservationHandler.php" style="width: 100%;" method="POST">
        <tr><input class="w3-margin-bottom" type="date" id="reserveDate" name="reservation" style="width:100%;height: 40px;"></tr>
        <tr>
            <select class="w3-section" list="time" id="timeSelection" name="times" placeholder="Choose a time" style="width: 100%;height: 40px;" required>
              <option value="choose a time" selected disabled>Choose a Time:</option>
              <option value="7:00AM">7:00 AM</option>
              <option value="3:00PM">3:00 PM</option>
              <option value="4:00PM">4:00 PM</option>
            </select>
        </tr>
        <tr><input class="w3-section" type="text" id="fname" name="fname" placeholder="Event Name" style="width: 100%;height: 40px;"></tr>
        <tr><input class="w3-section" type="text" id="lname" name="lname" placeholder="Name (First, Last)" style="width: 100%;height: 40px;"></tr>
        <tr><input class="w3-section" type="email" id="email" name ="email" placeholder="someone@example.com" style="width: 100%;height: 40px;"></tr>
        <tr><input type="hidden" id="ReservationArea" name="ReservationArea" value="HalfMainField1"></tr>
        <tr><input class="w3-section" type="submit" value="Save" style="width: 100%;height: 40px;"></tr>
          <?php
            if(isset($_SESSION["success"])){
              $success = $_SESSION["success"];
            }
          ?>
      </form>
      <div class="w3-padding-small w3-text-green w3-center">
        <?php
            if(isset($success)){
                echo $success;
            }
        ?>
      </div>
    </table>
  </div>
</div>

</body>
</html>
