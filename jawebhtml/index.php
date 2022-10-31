<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
/*if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}*/
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" media="screen and (max-device-width: 768px)" href="mobilestyle.css" />
    <!--Icon link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  </head>
  <body class="container">
    <div class="navbar">
      <div class="audioIcon">
        <i class="bi bi-volume-up icon invisible" onclick="render()" id="audioId"></i>
        <i class="bi bi-volume-mute icon " onclick="render()" id="mutedId"></i>
      </div>
    </div>
    
    <div class="video-wrapper">
      <video muted autoplay loop id="myVideo">
        <source src="img/imgjj.mp4" type="video/mp4" />
      </video>
    </div>


    <a href="logout.php"><button class="lgn-btn glow-on-hover" id="lgn-redt"><i class="fas fa-sign-out-alt"></i>Logout
    </button></a>

    <div class="popup">
        <span class="popuptext" id="myPopup">
            <h4>Credits</h4>
            <p>
                Hallowfe ohefwiuwhfei
            </p>
        </span>

    </div>
    <div class="popup">
        <span class="popuptext" id="myPopup">
            <h4>Credits</h4>
            <p>
                Hallowfe ohefwiuwhfei
            </p>
        </span>

    </div>
    <div class="content">

        <a href="modmenus.html">
            <button id="Button1" class="glow-on-hover">gta modmenus</button>
        </a>



        <a href="tools.php">
            <button id="Button2" class="glow-on-hover">tools</button>
        </a>



        <button id="Button3" onclick="popupwartung('Unser Discord ist aktuell in Wartungen!')" class="glow-on-hover">dsicord server 1007</button>
    </div>
    <div class="content">

        <a href="modmenus.html">
            <button id="Button1" class="glow-on-hover">gta modmenus</button>
        </a>
    </div>
    <div class="footer">
        <div class="popup-opener" onclick="popup()">Credits
        </div>
    </div>


    <script src="./js/script.js"></script>
    <script>
      window.onload = function() {  typeWriter()  }
      var i = 0;
      var txt = 'Welcome to 180Eywa |';
      var speed = 70;
      
      function typeWriter() {
        if (i < txt.length) {
          document.getElementById("demo").innerHTML += txt.charAt(i);
          i++;
          setTimeout(typeWriter, speed);
        }
      }
      </script>
  </body>
</html>

<script>
    // When the user clicks on <div>, open the popup
    function popup() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    function popupwartung(text) {
        var popup = document.getElementById("myPopup");
        popup.innerHTML = text;
        popup.classList.toggle("show");
        setTimeout(function() {
            popup.classList.toggle("show");
        },3000);
    }
</script>