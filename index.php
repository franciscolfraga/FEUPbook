<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <?php
  include ('config/init.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!--skeleton.css was created with the idea of having the common css code
      for all FEUPbook .php files, in this way we avoid code repeating. Whereas
      index.css has the css inherent to the current page.-->
   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/index.css">
   <link rel="icon" href="media/logo.png">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <!--If a session variable is set it will display a logged in user, it
        includes a session.php file where all the necessary .php and .css
        files are included in order to create a session environment.-->
    <?php if (isset($_SESSION['email'])) { ?>
      <div id="session">
        <?php include ('views/session.php'); ?>
      </div>
    <!--On the other hand, if a session variable is not set it will display
        an authentication card with the options of login and register (forms).
        A switch button has the purpose of alternating between the forms. This
        button works with the help of a javascript function formChange() that
        we can find in the file js/form-handler.js-->
    <?php } else { ?>
      <div class="authentication-form card">
        <?php
        include ('cards/login.php');
        include ('cards/register.php'); ?>
        <label class="switch" id="trigger">
          <input type="checkbox" onclick="formChange()">
          <span class="slider round"></span>
        </label>
      </div>
    <?php } ?>
    <!--notifications.php includes all the necessary files in order to create
        the notifications environment, both .php and .css-->
    <?php include ('views/notifications.php');?>
  </body>
  <head>
    <!--javascript file with the purpose of forms orchestration.-->
    <script type="text/javascript" src="js/form-handler.js"></script>

    <!--javascript file with the purpose of scroll orchestration-->
    <script type="text/javascript" src="js/news-handler.js"></script>


    <!--javascript file that will close a notification when you click on it.-->
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
</html>
