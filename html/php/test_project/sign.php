<?php
  //this file handles signing in
  session_start();
  if(!isset($_SESSION['signed_in'])){
    header('Location: index.php');
  }
  require_once "connect.php";

  $connection = @new mysqli($host, $db_user, $db_password, $db_name);

  if($connection ->connect_errno!=0) {
    echo "Error: ".$connection->connect_errno;
  }
  else {
    $login = $_POST['login_input'];
    $password = $_POST['password_input'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");
    $sql = "SELECT * FROM users WHERE username ='$login' AND password='$password'";

  if($result = @$connection -> query($sql)) {
    $how_many_users = $result -> num_rows;
    if ($how_many_users>0) {
      $_SESSION['signed_in'] = true;
      $record = $result ->fetch_assoc();
      $_SESSION['id'] = $record['id'];
      $_SESSION['username'] = $record['username'];
      $_SESSION['first_name'] = $record['first_name'];
      $_SESSION['second_name'] = $record['second_name'];
      $_SESSION['email'] = $record['e-mail'];
      $_SESSION['birthdate'] = $record['date_of_birth'];

      unset($_SESSION['error']);
      $result -> close();
      header('Location: profil.php');
    }
    else {
      $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
      header('Location: index.php');
    }
  }

    $connection -> close();
  }
 ?>
