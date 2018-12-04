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
   <link rel="stylesheet" type="text/css" href="../css/news.css">
   <link rel="icon" href="media/logo.png">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <!--If a session variable is set it will display the news feed.-->
    <?php if (isset($_SESSION['email'])) { ?>
      <div id="session">
        <?php
          include ('views/sticky-bar.php');
          include ('views/news.php');
          ?>
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

    <!--javascript file with the purpose of scroll orchestration-->
    <script type="text/javascript" src="js/news-handler.js"></script>

    <!--javascript file that will close a notification when you click on it.-->
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
</html>
