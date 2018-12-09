<?php
  include ('../../config/init.php');
  include ('../../database/edit.php');

  $target_file = $_FILES["photo"]["tmp_name"];


  // Check if image file is an actual image or fake image
  if(isset($_POST["submitPhoto"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);

    if($check !== false) {

      $fileName = "pic".substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16).".png";
      move_uploaded_file( $target_file , "../../media/profile-pics/$fileName");

      if (profilepicEdit($fileName , $_SESSION['id'])) {

        // Delete his last pic
        if($_SESSION['profilepic'] != 'media/profile-pics/default.png'){
          $old = getcwd(); // Save the current directory
          chdir("../../");
          unlink($_SESSION['profilepic']);
          chdir($old); // Restore the old working directory
        }
        $_SESSION['profilepic'] = "/media/profile-pics/$fileName";
        $_SESSION['success_message'] = "Profile picture uploaded successfully!";
      } else {
        $_SESSION['error_message'] = 'Program upload failed!';
      }
    } else {
        $_SESSION['error_message'] = 'File is not an image!';
    }
  }

  header('Location: ../../settings.php');
?>
