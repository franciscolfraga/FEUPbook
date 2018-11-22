<!DOCTYPE html>
<html lang="en-US">
  <?php
  include ('config/init.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/index.css">
   <link rel="icon" href="media/logo.png">
  </head>
  <body>
    <?php if (isset($_SESSION['email'])) { ?>
      <div id="session">
        <?php include ('views/session.php'); ?>
      </div>
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
    <?php include ('views/notifications.php');?>
  </body>
  <head>
    <script type="text/javascript" src="js/form-handler.js"></script>
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
</html>
