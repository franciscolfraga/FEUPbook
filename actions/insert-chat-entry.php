<?php
include ('../config/init.php');
include ('../database/member.php');

$postText = $_POST['post-text'];

$chat= $_POST['chatid'];

$location = $_POST['location'];

if($postText == ""){
  $_SESSION['error_message'] = 'Your message had no content';
  die(header('Location: ../index.php'));
}

if (!chatInsertion($postText, $_SESSION['id'], $chat)) {
  $_SESSION['error_message'] = 'Message failed!';
}

header('Location: ../../'.$location);
?>
