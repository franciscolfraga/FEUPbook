<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <?php
  include ('config/init.php');
  include ('cards/settings-card.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!--skeleton.css was created with the idea of having the common css code
      for all FEUPbook .php files, in this way we avoid code repeating. Whereas
      settings.css has the css inherent to the current page.-->
   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/settings.css">
   <link rel="icon" href="media/logo.png">
  </head>
  <body>
    <!--If a session variable is set the settings page is displayed.-->
    <?php if (isset($_SESSION['email'])) { ?>
    <div id="session">
      <?php include ('views/sticky-bar.php'); ?>
      <?php include ('views/settings-forms.php'); ?>
      <div class="card" id="settings">
        <!--This function will display the settings of any profile-id,
        not sure why I made it this way, maybe change it for the session
        member only???-->
        <?php settingsCard($_SESSION['id']);?>
      </div>
    </div>
    <!--If a session variable is not set we'll have an error message and
        redirection to the initial page.-->
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

    <!--javascript file with the purpose of settings-forms orchestration. It will
        get any section intended to be edited and display the form that gives
        you the chance to do it.-->
    <script type="text/javascript" src="js/settings-form-handler.js"></script>
  </head>
</html>
