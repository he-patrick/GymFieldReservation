<?php
/**
   * loginPage.php
   * 
   * login page
   * 
   * @author Calvin Luo <calvin.d.luo@gmail.com>
   * @author Patrick He <phetheep@gmail.com>
   * @version 2.9
   * @api Google calendar API
   */
//Start the session for session variables
session_start();
?>

<!DOCTYPE html> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    /*Text field CSS class self made for all text fields*/
    .text-field{
        width: 33%;
        height: 40px;
    }
    /*Centered CSS class self made for vertical and horizontal full screen centering*/
    .all-centered{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
<html>
    <!--Main body of the HTML-->
    <body class="w3-sand" style="opacity: 0.9;">
        <!--Centre everything horiontally and vertically-->
        <div class="all-centered">
            <div class="w3-container w3-center">
                <!--Titles and subtitles-->
                <div class="w3-center">
                    <h1 class="w3-wide w3-mobile" style="font-size: 60px;"><strong>Earl of March Gym and Field Bookings</strong></h1>
                    <h3 class="w3-monospace w3-text-light-green w3-mobile">Ready to reserve?</h2>
                    <p class="w3-mobile" style="opacity: 0.8;">Log in to reserve a gym or field at Earl of March Secondary School</p>
                </div>
                <!--HTML form to connect to the loginHandler.php class-->
                <form class="w3-center" action="loginHandler.php" method="post">
                    <!--Get the username, password, and submit with action to the loginHandler.php class-->
                    <input class="text-field" type="text" id="username" name="username" placeholder="Username or Email"><br><br>
                    <input class="text-field" type="password" id="passcode" name="passcode" placeholder="Password"><br><br>
                    <input class="w3-cyan w3-hover-light-green w3-border-0 text-field" type="submit" value="Log in">
                        <!--Check if the error variable is set, then assign it to a variable-->
                        <?php
                            if(isset($_SESSION["error"])){
                                $error = $_SESSION["error"];
                
                           }
                        ?>  
                    </form>
                <br>
                <!--Display the error message if the password is incorrect-->
                <div class="w3-padding-small w3-text-red">
                    <?php
                        if(isset($error)){
                            echo $error;
                        }
                    ?>
                </div>
                <!--Creating a button to open up the contact modal with onlick javascript-->
                <button class="text-field w3-cyan w3-hover-light-green w3-border-0 w3-auto" onclick="document.getElementById('contactModal').style.display='block';">Contact</button>
            </div>
            <!--Modal using W3 CSS classes-->
            <div id="contactModal" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-panel w3-sand" style="width: 40%;">
                    <div class="w3-container w3-section w3-center">
                      <!--Close the modal if the user clicks on the X in the top right-->
                      <span onclick="document.getElementById('contactModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                      <img src="Images/MsPort.png" alt="MsPort" style="width: 100%;height: 60%;">
                    </div>
                    <!--Ms. Port's name and email-->
                    <div class="w3-section w3-container w3-center">
                      <h2 class="w3-wide"><strong><em>Megan Port</em></strong></h2>
                      <!--Hyperlink taking the user to their default email application-->
                      <h4><a href="mailto: megan.port@ocdsb.ca" style="color: blue;">megan.port@ocdsb.ca</span></a></h4>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Java script code to open up the modal that is originally hidden-->
        <script>
            var modal = document.getElementById('contactModal');
            window.onclick = function(event){
                if(event.target == modal){
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>