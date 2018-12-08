<?php
  include ('../config/init.php');
  include ('../database/member.php');

  $name = strip_tags($_POST['name']);
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (!$name || !$email || !$password) {
    $_SESSION['error_message'] = 'All fields are mandatory!';
    $_SESSION['form_values'] = $_POST;
    die(header('Location: ../index.php'));
  }
  if (strpos($email, '@fe.up.pt') === false) {
    $_SESSION['error_message'] = 'You need an email from fe.up.pt domain!';
    $_SESSION['form_values'] = $_POST;
    die(header('Location: ../index.php'));
  }
  try {
    if( createMember($name, $email, $password))
      $_SESSION['success_message'] = 'Member registered with success!';
    else
      $_SESSION['error_message'] = 'Failed to register!';
  } catch (PDOException $e) {

    if (strpos($e->getMessage(), 'member_email_key') !== false){
      $_SESSION['error_message'] = 'Email already exists!';
    }
    else{
      $_SESSION['error_message'] = 'Failed to register!';
    }

    $_SESSION['form_values'] = $_POST;
  }

  header('Location: ../index.php');
?>
