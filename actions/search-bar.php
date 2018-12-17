<?php

  $search = $_POST['search'];

	if (isset($_POST['search']) AND $_POST['search'] != "") {
    header('Location: ../search-bar.php?field='.$_POST['search']);
	} else {
      header('Location: ../index.php');
  }

?>
