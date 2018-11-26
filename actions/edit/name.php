<?php
include ('../../config/init.php');
include ('../../database/edit.php');

$name = $_POST['name'];

if ( !$name) {
  $_SESSION['error_message'] = 'All fields are mandatory!';
  die(header('Location: ../../settings.php'));
}

if (nameEdit($name, $_SESSION['id'])) {
  $_SESSION['name'] = $name;
  $_SESSION['success_message'] = 'Name changed successfully!';
} else {
  $_SESSION['error_message'] = 'Name change failed!';
}

header('Location: ../../settings.php');
?>
