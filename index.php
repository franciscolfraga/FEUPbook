<!DOCTYPE html>
<html lang="en-US">
  <?php
  include ('config/init.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
    <?php if (isset($_SESSION['email'])) { ?>
      <div id="session">
        <h3>You are currently logged in!</h3>
        <a href="/actions/logout.php">Logout</a>
      </div>
    <?php } else { ?>
      <div class="authentication-form">
        <?php
        include ('views/login.php');
        include ('views/register.php'); ?>
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
  </head>
</html>
