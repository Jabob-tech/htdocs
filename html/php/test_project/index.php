<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strona logowania</title>
  </head>
  <body>
    <form action="order.php" method="post">
      <h1 class="form-label">Zaloguj się</h1><hr>
      <label for="email" class="input-label">Nazwa użytkownika lub email <br><br>
        <input type="text" name="email" value="" placeholder="email" class="form-input" required>
      </label>
      <label for="password" class="input-label">Hasło <br><br>
        <input type="password" name="password" placeholder="hasło"class="form-input" required>
      </label>
      <button type="submit" name="send-button" value="" class="send-button">zaloguj się</button>
    </form>
  </body>
</html>
