<!DOCTYPE html>
<html lang="en-US">
  <?php
  include ('config/init.php');
  include ('cards/settings-card.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/settings.css">
   <link rel="icon" href="media/logo.png">
  </head>
  <body>
    <div id="session">
      <?php include ('views/sticky-bar.php'); ?>
      <?php include ('views/settings-forms.php'); ?>
      <div class="card" id="settings">
        <?php settingsCard($_SESSION['id']);?>
      </div>
    </div>
    <?php include ('views/notifications.php');?>
  </body>
  <head>
    <script type="text/javascript" src="js/notification-transition.js"></script>
    <script type="text/javascript" src="js/settings-form-handler.js"></script>
  </head>
</html>
