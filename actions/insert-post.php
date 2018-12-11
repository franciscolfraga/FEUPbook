<?php
include ('../config/init.php');
include ('../database/member.php');

$postText = $_POST['post-text'];

$circle = $_POST['circleid'];

$location = $_POST['location'];

if($postText == ""){
  $_SESSION['error_message'] = 'Your post had no content';
  die(header('Location: ../index.php'));
}

if (postInsertion($postText, $_SESSION['id'], $circle)) {
  $_SESSION['success_message'] = 'Posted successfully!';
} else {
  $_SESSION['error_message'] = 'Post failed!';
}

header('Location: ../../'.$location);
?>
