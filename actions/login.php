<?php
  include ('../config/init.php');
  include ('../database/member.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (isValidMember($email, $password)) {
    $_SESSION['success_message'] = 'Login successful!';
    $_SESSION['email'] = $email;
  } else {
    $_SESSION['error_message'] = 'Login failed!';
  }

  header('Location: ../index.php');
?>
