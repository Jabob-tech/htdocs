<?php
  session_start();
  if ((isset($_SESSION['signed_in'])) && ($_SESSION['signed_in']==true)) {
    header('Location: profil.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strona logowania</title>
  </head>
  <body>
    <form action="sign.php" method="post">
      <h1 class="form-label">Zaloguj się</h1><hr>
      <label for="email" class="input-label">Nazwa użytkownika lub email <br><br>
        <input type="text" name="login_input" placeholder="login" class="form-input" required>
      </label><br><br>
      <label for="password" class="input-label">Hasło <br><br>
        <input type="password" name="password_input" placeholder="hasło" class="form-input" required>
      </label>
      <br><br>
      <button type="submit" name="send-button" value="" class="send-button">zaloguj się</button>
    </form>
    <br>
    <?php
    if(isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    }
    ?>
  </body>
</html>
