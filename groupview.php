<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <?php
  include ('config/init.php');
  include ('views/groupslist.php');
  include ('database/details.php');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-15">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/feed.css">
   <link rel="icon" href="media/logo.png">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>

    <?php if (isset($_SESSION['email'])) { ?>
      <div id="session">
        <?php $postscircle = $_GET['groupid'];
          $location = 'groupview.php?groupid='.$postscircle;
          include ('views/sticky-bar.php');
          $groupDetails = getCircleDetails($postscircle);
          
          if(checkAllowed($_SESSION['id'], $postscircle)) {?>
            <h1 class="group_title"> <?= $groupDetails['name']; ?> Group </h1>
            <?php  include ('views/post-box.php'); ?>
            <div id="posts_feed" class = "group_feed">
            </div>
          <?php } else { ?> <h1 class="group_title"> You are not allowed to see this content!</h1> <?php } ?>
      </div>
    <?php } else {
      $_SESSION['error_message'] = 'You are not logged in!';
      header('Location: ../index.php');
     } ?>
    <!--notifications.php includes all the necessary files in order to create
        the notifications environment, both .php and .css-->
    <?php include ('views/notifications.php');?>
  </body>
  <head>
    <!--javascript file with the purpose of forms orchestration.-->
    <script type="text/javascript" src="js/form-handler.js"></script>

    <script type="text/javascript" src="js/post-box-handler.js"></script>

    <script type="text/javascript" src="js/posts-handler.js"></script>

    <!--javascript file that will close a notification when you click on it.-->
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
  <script> getPostsFrom(<?= $postscircle; ?>) </script>
</html>
