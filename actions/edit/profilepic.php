<?php
  include ('../../config/init.php');
  include ('../../database/edit.php');

  $img_name = $_POST['img_name'];
  $tmp_name = $_FILES['photo']['tmp_name'];

  $fileName = "pic".substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
  $filePath = "media/profile-pics/$fileName.png";

  if (profilepicEdit($filePath, $_SESSION['id'])) {
    move_uploaded_file($tmp_name, "../../media/profile-pics/$fileName.png");
    // Delete his last pic
    $old = getcwd(); // Save the current directory
    chdir("../../");
    unlink($_SESSION['profilepic']);
    chdir($old); // Restore the old working directory
    $_SESSION['profilepic'] = $filePath;
    $_SESSION['success_message'] = "Profile picture uploaded successfully!";
  } else {
    $_SESSION['error_message'] = 'Program upload failed!';
  }
  header('Location: ../../settings.php');
?>
