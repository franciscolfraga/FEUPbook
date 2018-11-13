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
  <?php }

?>
