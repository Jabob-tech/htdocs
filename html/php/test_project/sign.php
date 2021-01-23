<?php
  //this file handles signing in
  session_start();
  require_once "connect.php";

  $connection = @new mysqli($host, $db_user, $db_password, $db_name);

  if($connection ->connect_errno!=0) {
    echo "Error: ".$connection->connect_errno;
  }
  else {
    $login = $_POST['login_input'];
    $password = $_POST['password_input'];
    $sql = "SELECT * FROM users WHERE username ='$login' AND password='$password'";

  if($result = @$connection -> query($sql)) {
    $how_many_users = $result -> num_rows;
    if ($how_many_users>0) {
      $record = $result ->fetch_assoc();
      $_SESSION['username'] = $record['username'];
      header('Location: profil.php');


      $result -> close();
    }
    else {
    }
  }


    $connection -> close();
  }
 ?>
