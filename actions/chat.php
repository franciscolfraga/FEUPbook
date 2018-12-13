<?php
  include('../config/init.php');
  include('../database/member.php');

  $member2 = $_GET['member2'];
  $member1 = $_GET['member1'];

  $chat = CreateIfNeeded( $member1 , $member2);


  if ( $chat != null ) {
    $chatid = $chat['id'];
    die(header("Location: ../chat.php?id=$chatid"));
  } else {
    $_SESSION['error_message'] = 'Chat generation failed!';
    header('Location: ../index.php');
  }

?>
