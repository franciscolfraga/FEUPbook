<?php
  include ('database/user.php');
  function profileCard($id){
    $currentUser = getUser($id);
    if ($currentUser) { ?>
      <div id="cover"></div>
      <img id="picture" src="<?php echo $currentUser['profilepic']?>">
      <h2 id="name"><?= $currentUser['name'] ?></h2>
    <?php } else {
      $_SESSION['error_message'] = 'User not found!';
    }
  } ?>
