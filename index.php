<!DOCTYPE html>
<?php include ('config/init.php');?>
<html lang="en-US">
  <head>
   <title>Feupbook</title>
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

    <?php include ('views/errors.php');?>
  </body>
</html>
