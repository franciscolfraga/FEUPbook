<?php
include ('../../config/init.php');
include ('../../database/edit.php');
include ('../../database/lists.php');

$membertypeName = $_POST['membertypes'];
$membertypes = getMemberTypes();
$membertypeid = 0;

foreach ($membertypes as $value){
  if($value['name'] == $membertypeName){
    $membertypeid = $value['id'];
    $_SESSION['success_message'] = "MemberType finded $membertypeid!";
    break;
  }
}

if( $membertypeid == 0 ){
  $_SESSION['error_message'] = "MemberType finding failed for -$membertypeName-!";
  die(header('Location: ../../settings.php'));
}

if (memberTypeEdit($membertypeid, $_SESSION['id'])) {
  $_SESSION['membertypeid'] = $membertypeid;
  $_SESSION['success_message'] = 'MemberType changed successfully!';
} else {
  $_SESSION['error_message'] = 'MemberType change failed!';
}

header('Location: ../../settings.php');
?>
