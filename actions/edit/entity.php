<?php
include ('../../config/init.php');
include ('../../database/edit.php');
include ('../../database/lists.php');

$entityName = $_POST['entities'];
$entities = getEntities();
$entityid = 0;

foreach ($entities as $value){
  if($value['name'] == $entityName){
    $entityid = $value['id'];
    $_SESSION['success_message'] = "Entity finded $entityid!";
    break;
  }
}

if( $entityid == 0 ){
  $_SESSION['error_message'] = "Entity finding failed for -$entityName-!";
  die(header('Location: ../../settings.php'));
}

if (entityEdit($entityid, $_SESSION['id'])) {
  $_SESSION['entityid'] = $entityid;
  $_SESSION['success_message'] = 'Entity changed successfully!';
} else {
  $_SESSION['error_message'] = 'Entity change failed!';
}

header('Location: ../../settings.php');
?>
