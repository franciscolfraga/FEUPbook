<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <?php
  include ('config/init.php');
  include ('views/messageslist.php');
  header ('Content-type: text/html; charset=ISO-8859-15');
  ?>
  <head>
   <title>FEUPbook</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-15">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="css/skeleton.css">
   <link rel="stylesheet" type="text/css" href="css/messages.css">
   <link rel="stylesheet" type="text/css" href="css/chat.css">
   <link rel="icon" href="media/logo.png">
  </head>
  <body>
    <?php if (isset($_SESSION['email'])) {
      if(isset($_GET['id'])){
        $chatid = $_GET['id'];
        $location = 'messages.php?id='.$chatid;?>
        <div id="session">
          <?php include ('views/sticky-bar.php'); ?>
          <div id="messages_feed">
            <h2>Messages</h2>
            <table id="messages_table">
              <tr>
                <td class="list">
                  <div id="message-list">
                  <?php if($_GET['id'] == "") {?>
                    <h4 id="no_groups" style="text-align: center">No groups to be displayed!</h4>
                  <?php } else { ?>
                    <?php listMessages($chatid); ?>
                  <?php } ?>
                </div>
                </td>
                <td class="my_messages">
                  <div id="entries-list">
                    <?php if($_GET['id'] == "") {?>
                      <h4 id="no_groups" style="text-align: center">No messages to be displayed!</h4>
                    <?php } else {
                     getChat($chatid);
                     } ?>
                  </div>
                  <?php if($_GET['id'] !== "") include ('views/chat-box.php'); ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
    <?php } else {
            $circles = getMessagesCircles($_SESSION['id']);
            $chatid = array_values($circles)[0]['chatid'];
            $location = 'messages.php?id='.$chatid;
            header('Location: '.$location);
          }
        } else {
      $_SESSION['error_message'] = 'You are not logged in!';
      header('Location: ../index.php');
     } ?>

    <?php include ('views/notifications.php');?>
  </body>
  <head>
    <!--javascript file that will close a notification when you click on it.-->
    <script type="text/javascript" src="js/notification-transition.js"></script>
  </head>
</html>
