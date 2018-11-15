<head>
  <link rel="stylesheet" type="text/css" href="../css/notifications.css">
</head>
  <?php if (isset($_ERROR_MESSAGE)) { ?>
  <div id="errors" class="notifications">
    <div class="text"><?=$_ERROR_MESSAGE?></div>
  </div>
  <?php } ?>

  <?php if (isset($_SUCCESS_MESSAGE)) { ?>
  <div id="success" class="notifications">
    <div class="text"><?=$_SUCCESS_MESSAGE?></div>
  </div>
  <?php } ?>

  <?php if (isset($_DB_ERROR)) { ?>
  <div id="db-error-container" class="notifications">
    <div id="db-error" class="notifications">
      <div class="text">
        <img src="img/errors/wifi-notification.png" id="no-db-img"><br>
        <b>Something went wrong! Apparently you can't connect to our DB...</b><br><br>
        <b>Please try to fix the problem and refresh the page.</b><br>
      </div>
    </div>
  </div>
  <?php } ?>
