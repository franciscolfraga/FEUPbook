<?php
include ('../../config/init.php');
include ('../../database/edit.php');
include ('../../database/lists.php');

$departmentName = $_POST['departments'];
$departments = getDepartments();
$depid = 0;

foreach ($departments as $value){
  if($value['name'] == $departmentName){
    $depid = $value['id'];
    break;
  }
}

if( $depid == 0 ){
  $_SESSION['error_message'] = "Department finding failed for $departmentName!";
  die(header('Location: ../../settings.php'));
}

if (departmentEdit($depid, $_SESSION['id'])) {
  $_SESSION['depid'] = $depid;
  $_SESSION['success_message'] = 'Department changed successfully!';
} else {
  $_SESSION['error_message'] = 'Department change failed!';
}

header('Location: ../../settings.php');
?>
