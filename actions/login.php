<?php
  include ('../config/init.php');
  include ('../database/user.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (isValidUser($email, $password)) {
    $_SESSION['success_message'] = 'Login successful!';
    $_SESSION['email'] = $email;
  } else {
    $_SESSION['error_message'] = 'Login failed!';
  }

  header('Location: ../index.php');
?>
