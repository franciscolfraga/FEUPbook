<?php
include ('../config/init.php');
include ('../database/member.php');

$postText = $_POST['post-text'];

$circle = $_POST['circleid'];

$location = $_POST['location'];

if($postText == ""){
  $_SESSION['error_message'] = 'Your post had no text';
  die(header('Location: ../index.php'));
}

$fileName = "";
$filetype = "";

$target_file = $_FILES['myfile']['tmp_name'];

if(!empty($_FILES['myfile']['name'])) {

    $mime = $_FILES['myfile']['type'];
    $_SESSION['error_message'] = 'Caught file!' . $mime;

    if(strstr($mime, "video/")){
      $filetype = "video";
      $fileName = "video".substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16)."";
      move_uploaded_file( $target_file, "../media/post-video/$fileName");
    }
    else if(strstr($mime, "image/")){
      $filetype = "image";
      $fileName = "pic".substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16).".png";
      move_uploaded_file( $target_file , "../media/post-pics/$fileName");
    }
    else if(strstr($mime, "audio/")){
      $filetype = "audio";
      $fileName = "audio".substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16)."";
      move_uploaded_file( $target_file , "../media/post-audio/$fileName");
  } else {
    $filetype = "other";
    $fileName = "other".substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16)."";
    move_uploaded_file( $target_file , "../media/post-other/$fileName");
  }
}

if (postInsertion($postText, $_SESSION['id'], $circle, $fileName, $filetype)) {
  $_SESSION['success_message'] = 'Posted successfully!';
} else {
  $_SESSION['error_message'] = 'Post failed!';
}

header('Location: ../../'.$location);
?>
