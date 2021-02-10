<?php
session_start();

  if (isset($_POST['first_name'])) {
    //succesful validation flag
    $all_data_ok = true;
    //checking first_name
    $first_name = $_POST['first_name'];
    //first_name lenght validation
    if((strlen($first_name)<3) || (strlen($first_name)>16)) {
      $all_data_ok = false;
      $_SESSION['e_first_name'] = "Wpisane imię może mieć od 3 do 16 liter";
    }

    //checking second_name
    $second_name = $_POST['second_name'];
    if((strlen($second_name)<2) || (strlen($second_name)>20)) {
      $all_data_ok = false;
      $_SESSION['e_second_name'] = "Wpisane Nazwisko może mieć od 2 do 25 liter";
    }
    //checking email
    $email = $_POST['email'];

    //checking date_of_birth
    $date_of_birth = $_POST['date_of_birth'];

    //checking username
    $username = $_POST['username'];
    if((strlen($username)<3) || (strlen($username)>20)) {
      $all_data_ok = false;
      $_SESSION['e_username'] = "Nazwa użytkownika może mieć od 3 do 20 liter";
    }
    if (ctype_alnum($username) == false) {
      $all_data_ok = false;
      $_SESSION['e_username'] = "Nazwa użytkownika może składać się tylko z liter i cyfr";
    }

    //checking password
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $password_lenght = strlen($password);
    switch ($password_lenght) {

      case ($password_lenght<8):
        $_SESSION['e_password'] = "Hasło musi składać się z co najmniej 8 znaków ";
        echo $_SESSION['e_password'];
        break;

      case ($password_lenght>20):
        $_SESSION['e_password'] = "Hasło może mieć maksymalnie 20 znaków ";
        echo $_SESSION['e_password'];
        break;
    }
    if($password !== $password_repeat) {
      $_SESSION['e_password'] = "Hasła nie są takie same ";
      echo $_SESSION['e_password'];
    }
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if (!isset($_POST['statute_accept'])){
      $all_data_ok = false;
      $_SESSION['e_statute'] = "Akceptacja regulaminu wymagana";
    }
    //reCAPTCHA validation
    $reCAPTCHA_Secret_Key = "6Lc1qj4aAAAAAK1BBYX9jgxsbvAzSgf9X_p2ic_R";
    $check = file_get_contents('https://google.com/recaptcha/api/siteverify?secret='.$reCAPTCHA_Secret_Key.'&response='.$_POST['g-recaptcha-response']);
    $answer = json_decode($check);
    if ($answer->success !== true) {
      $_SESSION['e_recaptcha'] = "Wymagane potwierdzenie reCAPTCHA ";
      echo $_SESSION['e_recaptcha'];
    }
    if ($all_data_ok == true) {
      //All data ok, adding user to database
      echo "Dziękujemy za rejestrację w naszym serwisie!";
      exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rejestracja</title>
  <!--  <script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  }; -->
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style type="text/css">
body{
  font-family: verdana;
}
.registration-form__error{
  color: red;
  margin-top: 10px;
  margin-bottom: 10px;
}
</style>
  </head>

  <body>
<form class="registration-form" method="post">
  <h1>Zarejestruj się</h1><hr>

  <label for="first_name" class="registration-form__input-label">Imię</label><br>
  <input type="text" name="first_name" value="" class="registration-form__input" placeholder="Imię" required>

<?php if (isset($_SESSION['e_first_name'])) {
    echo '<div class="registration-form__error">'.$_SESSION['e_first_name'].'</div>';
    unset($_SESSION['e_first_name']);
    }
?><br>

  <label for="second_name" class="registration-form__input-label">Nazwisko</label><br>
  <input type="text" name="second_name" value="" class="registration-form__input" placeholder="Nazwisko" required><br>

  <?php if (isset($_SESSION['e_second_name'])) {
      echo '<div class="registration-form__error">'.$_SESSION['e_second_name'].'</div>';
      unset($_SESSION['e_second_name']);
      }
  ?><br>

  <label for="email" class="registration-form__input-label">E-mail</label><br>
  <input type="email" name="email" value="" class="registration-form__input" placeholder="E-mail" required><br><br>

  <label for="date_of_birth" class="registration-form__input-label">Data urodzenia</label><br>
  <input type="date" name="date_of_birth" value="" class="registration-form__input" placeholder="Data urodzenia" required><br><br>

  <label for="username" class="registration-form__input-label">Nazwa użytkownika</label><br>
  <input type="text" name="username" value="" class="registration-form__input" placeholder="Nazwa używkownika" required><br>

  <?php if (isset($_SESSION['e_username'])) {
      echo '<div class="registration-form__error">'.$_SESSION['e_username'].'</div>';
      unset($_SESSION['e_username']);
      }
  ?><br>

  <label for="password" class="registration-form__input-label">Hasło</label><br>
  <input type="password" name="password" value="" class="registration-form__input" placeholder="Hasło" required><br><br>

  <label for="password_repeat" class="registration-form__input-label">Powtórz hasło</label><br>
  <input type="password" name="password_repeat" value="" class="registration-form__input" placeholder="Powtórz hasło" required><br><br>

  <?php if (isset($_SESSION['e_password'])) {
      echo '<div class="registration-form__error">'.$_SESSION['e_password'].'</div>';
      unset($_SESSION['e_password']);
      }
  ?>
  <input type="checkbox" name="statute_accept" id="statute_accept">
  <label for="statute_accept">Akceptuję regulamin</label><br><br>
  <?php if (isset($_SESSION['e_statute'])) {
      echo '<div class="registration-form__error">'.$_SESSION['e_statute'].'</div>';
      unset($_SESSION['e_statute']);
      }
  ?><br>
   <div class="g-recaptcha" data-sitekey="6Lc1qj4aAAAAAO65CiyQpISrD-vP3sVgW_kOEYci"></div>
   <?php if (isset($_SESSION['e_recaptcha'])) {
       echo '<div class="registration-form__error">'.$_SESSION['e_recaptcha'].'</div>';
       unset($_SESSION['e_recaptcha']);
       }
   ?><br>
  <button type="password" name="button" class="registration-form__button registration-form__button--active">Zarejestruj się</button>
</form>
  </body>
</html>
