<head>
  <link rel="stylesheet" type="text/css" href="../css/notifications.css">
</head>
<div class="notifications-area">
    <?php if (isset($_ERROR_MESSAGE)) { ?>
    <div id="errors" class="notifications">
      <table>
        <tr>
          <td class="image"><img src="media/errors/wrong.png" id="no-db-img"></td>
          <td class="text"><?=$_ERROR_MESSAGE?></td>
        </tr>
      </table>
    </div>
    <?php }?>
    <?php if (isset($_SUCCESS_MESSAGE)) { ?>
    <div id="success" class="notifications">
      <table>
        <tr>
          <td class="image"><img src="media/errors/check-mark.png" id="no-db-img"></td>
          <td class="text"><?=$_SUCCESS_MESSAGE?></td>
        </tr>
      </table>
    </div>
    <?php }?>
    <?php if (isset($_DB_ERROR)) { ?>
    <div id="db-error-container" class="notifications">
      <div id="db-error" class="notifications">
        <table>
          <tr>
            <td class="image"><img src="media/errors/wifi-notification.png" id="no-db-img"></td>
            <td class="text"><?=$_DB_ERROR?></td>
          </tr>
        </table>
      </div>
      </div>
    <?php } ?>
</div>
