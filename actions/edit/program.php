<?php
include ('../../config/init.php');
include ('../../database/edit.php');
include ('../../database/lists.php');

$programName = $_POST['programs'];
$programs = getPrograms();
$programid = 0;

foreach ($programs as $value){
  if($value['name'] == $programName){
    $programid = $value['id'];
    break;
  }
}

if( $programid == 0 ){
  $_SESSION['error_message'] = "Program finding failed for $programName!";
  die(header('Location: ../../settings.php'));
}

if (programEdit($programid, $_SESSION['id'])) {
  $_SESSION['programid'] = $programid;
  $_SESSION['success_message'] = 'Program changed successfully!';
} else {
  $_SESSION['error_message'] = 'Program change failed!';
}

header('Location: ../../settings.php');
?>
