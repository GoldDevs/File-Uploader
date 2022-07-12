<?php

include "../src/require.php";

$phpVersion = phpversion();
if (version_compare($phpVersion, '8.0.20', '<')) {
     die("PHP 8.0.20 or newer is required. $phpVersion does not meet this requirement. Please ask your host to upgrade PHP.");
}

// check if session pass1_done and pass2_done are set
if (!isset($_SESSION['pass1_done'])) {
     header("Location: pass1.php");
} else if (!isset($_SESSION['pass2_done'])) {
     header("Location: pass2.php");
}

if(isset($_POST['web'])) {

     $web = $_POST['web'];
     $service_name = $web['service_name'];
     $service_description = $web['service_description'];

     $config = file_get_contents("../src/config.php");
     $config = str_replace("V_SERVICE_NAME", $service_name, $config);
     $config = str_replace("V_SERVICE_DESCRIPTION", $service_description, $config);
     file_put_contents("../src/config.php", $config);

     session_start();
     $_SESSION['pass3_done'] = true;

     header("Location: pass4.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width">

     <title>Istaller</title>

     <link href="../assets/images/icon.png" rel="shortcut icon" />
     <link href="../assets/css/register.css" rel="stylesheet" type="text/css" />


     <link rel="preconnect" href="https://fonts.gstatic.com/">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&amp;display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.gstatic.com/">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&amp;display=swap" rel="stylesheet">

     <style>
          body {
               font-family: 'Roboto', sans-serif;
          }
     </style>

     <img class="logo" src="../assets/images/icon.png">
</head>

<body>
     <p><br></p>
     <form class="box" method="post" action="">

          <h2>Website</h2>
          <input type="text" name="service_name" placeholder="Service Name" required>
          <input type="text" name="service_description" placeholder="Service Description" required>

          <button class="submit" type="submit" name="web">Continue</button>
          <div class="error">
               <h3 id="errormsg"></h3>
          </div>
     </form>


     <script type="061475e7a149ead4adfff902-text/javascript">
          var element = document.body;
          if (localStorage.getItem("darkmodeprefsenabled") == null) {
               localStorage.setItem("darkmodeprefsenabled", false);
          }
          if (localStorage.getItem("darkmodeprefsenabled") == "true") {
               element.classList.toggle("darkmode");
          }
     </script>
     </div>
     <script src="../assets/js/loader.js" data-cf-settings="061475e7a149ead4adfff902-|49" defer=""></script>
</body>

</html>