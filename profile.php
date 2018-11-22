<!DOCTYPE html>
<html lang="en-US">
  <?php
  include ('config/init.php');
  include ('cards/profile-card.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/profile.css">
   <link rel="icon" href="media/logo.png">
  </head>
  <body>
    <div id="session">
      <?php include ('views/sticky-bar.php'); ?>
      <div class="card" id="profile">
      <?php profileCard($_SESSION['id']);?>
      </div>
    </div>
    <?php include ('views/notifications.php');?>
  </body>
  <head>
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
</html>
