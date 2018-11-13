<!DOCTYPE html>
<html lang="en-US">
  <?php
  include ('config/init.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
    <nav>
      <?php if (isset($_SESSION['email'])) { ?>
        <div id="session">
          <h3>You are currently logged in!</h3>
          <a href="/actions/logout.php">Logout</a>
        </div>
      <?php } else {
          include ('views/login.php');
          include ('views/register.php');
        } ?>
    </nav>
    <?php include ('views/notifications.php');?>
  </body>
</html>
