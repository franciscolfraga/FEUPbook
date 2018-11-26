<?php
include ('../../config/init.php');
include ('../../database/edit.php');

$email = $_POST['email'];

if ( !$email) {
  $_SESSION['error_message'] = 'All fields are mandatory!';
  die(header('Location: ../../settings.php'));
}
if (strpos($email, '@fe.up.pt') === false) {
  $_SESSION['error_message'] = 'You need an email from fe.up.pt domain!';
  die(header('Location: ../../settings.php'));
}

if (emailEdit($email, $_SESSION['id'])) {
  $_SESSION['success_message'] = 'Email changed successfully!';
} else {
  $_SESSION['error_message'] = 'Email change failed!';
}

header('Location: ../../settings.php');
?>
