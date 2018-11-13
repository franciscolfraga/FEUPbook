<?php if (isset($_ERROR_MESSAGE)) { ?>
<div id="errors">
  <?=$_ERROR_MESSAGE?>
</div>
<?php } ?>

<?php if (isset($_SUCCESS_MESSAGE)) { ?>
<div id="success">
  <?=$_SUCCESS_MESSAGE?>
</div>
<?php } ?>
