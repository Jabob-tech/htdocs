<?php
  session_start();
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
echo "<p><b>e-mail</b>: ".$_SESSION['email'];

 ?>
  </body>
</html>
