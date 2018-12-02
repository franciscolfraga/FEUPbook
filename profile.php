<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <?php
  include ('config/init.php');
  include ('cards/profile-card.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!--skeleton.css was created with the idea of having the common css code
      for all FEUPbook .php files, in this way we avoid code repeating. Whereas
      profile.css has the css inherent to the current page.-->
   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/profile.css">
   <link rel="icon" href="media/logo.png">
  </head>
  <body>
      <!--If a session variable is set the profile page is displayed.-->
    <?php if (isset($_SESSION['email'])) { ?>
      <div id="session">
        <?php include ('views/sticky-bar.php'); ?>
        <!--This function will display any profile for a certain user id.
          Created this way to use it to show a profile of any user.-->
        <div class="card" id="profile">
          <?php profileCard($_SESSION['id']);?>
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
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
</html>
