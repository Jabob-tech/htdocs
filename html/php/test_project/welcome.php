<?php
  session_start();
  if (!isset($_SESSION['successful_registration'])) {
    header('Location: index.php');
    exit();
  }
  else{
      unset($_SESSION['successful_registration']);
  }
//unsetting all $_SESSION variables
if(isset($_SESSION['rf_first_name'])) unset($_SESSION['rf_first_name']);
if(isset($_SESSION['rf_second_name'])) unset($_SESSION['rf_second_name']);
if(isset($_SESSION['rf_email'])) unset($_SESSION['rf_email']);
if(isset($_SESSION['rf_date_of_birth'])) unset($_SESSION['rf_date_of_birth']);
if(isset($_SESSION['rf_username'])) unset($_SESSION['rf_username']);
if(isset($_SESSION['rf_statute_accept'])) unset($_SESSION['rf_statute_accept']);
?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Witaj!</title>
  </head>
  <html>
  <h1>Hej!</h1>
  <h3>Bardzo miło cię widzieć!</h3>
  <a href="index.php">Zaloguj się!</a>
  </html>
</html>
