<?php
  session_start();
  if(!isset($_SESSION['signed_in'])){
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
  </head>
  <body>
<?php

echo "<p>Witaj ".$_SESSION['username'].'! [<a href="logout.php">Wyloguj się</a>]</p>';
echo "<p><b>Imię</b>: ".$_SESSION['first_name']." ";
echo "<b>Nazwisko</b>: ".$_SESSION['second_name']."</p>";
echo "<p><b>e-mail: </b> ".$_SESSION['email'];
echo "<p><b>Data urodzenia: </b>" .$_SESSION['birthdate'];

 ?>
  </body>
</html>
