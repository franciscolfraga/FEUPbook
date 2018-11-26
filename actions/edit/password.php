<?php
include ('../../config/init.php');
include ('../../database/edit.php');

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];

if ( !$newpassword || !$oldpassword) {
  $_SESSION['error_message'] = 'All fields are mandatory!';
  die(header('Location: ../../settings.php'));
}


if (password_verify($oldpassword, $_SESSION['password'])){
  $_SESSION['error_message'] = 'Your old password is incorrect!';
  die(header('Location: ../../settings.php'));
}

if (passwordEdit($newpassword, $_SESSION['id'])) {
  $_SESSION['success_message'] = 'Password changed successfully!';
} else {
  $_SESSION['error_message'] = 'Password change failed!';
}

header('Location: ../../settings.php');
?>
