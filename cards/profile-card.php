<?php
  include ('database/user.php');
  function profileCard($id){
    $currentUser = getUser($id);
    if ($currentUser) { ?>
      <div id="cover"></div>
      <img id="picture" src="<?php echo $currentUser['profilepic']?>">
      <table class="profile-table">
        <tr>
          <td id="name" colspan="2">
            <h2><?= $currentUser['name'] ?></h2>
            <?php if ($currentUser['entityid']) {
              $entity = getEntity($id);?>
              <h3 id="entity"><?= $entity['name'] ?></h3>
            <?php } ?>
          </td>
        </tr>
        <?php if ($currentUser['programid'] and $currentUser['entityid'] == 1) {
        $program = getProgram($id);?>
          <tr>
            <td><img id="program-logo" src="<?= $program['logo'] ?>"></td>
          </tr>
          <tr>
            <td id="program-name"><?= $program['initials'] ?></td>
          </tr>
          <tr>
            <td id="program-name"><?= $program['name'] ?></td>
          </tr>
          <tr>
            <td id="program-dep"><?= $program['department'] ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td><img id="email-logo" src="media/icons/email.png"></td>
        </tr>
        <tr>
          <td id="email-display"><h4><?= $currentUser['email'] ?></h4></td>
        </tr>
      </table>
    <?php } else {
      $_SESSION['error_message'] = 'User not found!';
    }
  } ?>
