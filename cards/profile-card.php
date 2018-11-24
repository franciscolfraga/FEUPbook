<?php
  include ('database/user.php');
  function profileCard($id){
    $currentUser = getUser($id);
    if ($currentUser) { ?>
      <div id="cover"></div>
      <img id="picture" src="<?php echo $currentUser['profilepic']?>">
      <table class="profile-table">
        <tr>
          <td id="name" colspan="2"><h2><?= $currentUser['name'] ?></h2></td>
        </tr>
        <?php if ($currentUser['programid']) {
          $program = getProgram($id);?>
        <tr>
          <td id="program-logo"><img src="<?= $program['logo'] ?>"></td>
        </tr>
        <tr>
          <td id="program-name"><?= $program['name'] ?></td>
        </tr>
      <?php } ?>
      </table>
    <?php } else {
      $_SESSION['error_message'] = 'User not found!';
    }
  } ?>
