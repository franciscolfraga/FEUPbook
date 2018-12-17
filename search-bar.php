<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <?php
  include ('config/init.php');
  header ('Content-type: text/html; charset=ISO-8859-15');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-15">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!--skeleton.css was created with the idea of having the common css code
      for all FEUPbook .php files, in this way we avoid code repeating. Whereas
      index.css has the css inherent to the current page.-->
   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="icon" href="media/logo.png">
  </head>
  <body>
    <!--If a session variable is set it will display a logged in member, it
        includes a session.php file where all the necessary .php and .css
        files are included in order to create a session environment.-->
    <?php if (isset($_SESSION['email'])) { ?>
      <div id="session">
				<?php include ('views/sticky-bar.php');
							include ('views/search.php'); ?>
      </div>
    <!--On the other hand, if a session variable is not set it will display
        an authentication card with the options of login and register (forms).
        A switch button has the purpose of alternating between the forms. This
        button works with the help of a javascript function formChange() that
        we can find in the file js/form-handler.js-->
    <?php } else {
			$_SESSION['error_message'] = 'You are not logged in!';
      header('Location: ../index.php');
     } ?>
    <!--notifications.php includes all the necessary files in order to create
        the notifications environment, both .php and .css-->
    <?php include ('views/notifications.php');?>
  </body>
  <head>
    <!--javascript file that will close a notification when you click on it.-->
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
</html>
