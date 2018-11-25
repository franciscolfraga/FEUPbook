<?php
  include ('database/user.php');
  include ('database/lists.php');
  function settingsCard($id){
    $currentUser = getUser($id);
    $entity = getEntities();
    $program = getPrograms();
    if ($currentUser) { ?>
        <h2>Settings</h2>
        <table>
          <tr>
            <td class="description">Name:</td>
            <td><?= $currentUser['name'] ?></td>
            <td class="edit"><img onclick="settingsNameHandler()" src="media/icons/edit.png"></td>
          </tr>
          <tr>
            <td class="description">Email:</td>
            <td><?= $currentUser['email'] ?></td>
            <td class="edit"><img onclick="settingsEmailHandler()" src="media/icons/edit.png"></td>
          </tr>
          <tr>
            <td class="description">Password:</td>
            <td>********</td>
            <td class="edit"><img onclick="settingsPasswordHandler()" src="media/icons/edit.png"></td>
          </tr>
          <tr>
            <td class="description">Entity:</td>
            <td>
                <?php foreach ($entity as $value) {
                  if($value['id'] == $currentUser['entityid']) {?>
                  <?= $value['name'] ?>
                <?php  } } ?>
            </td>
            <td class="edit"><img onclick="settingsEntityHandler()" src="media/icons/edit.png"></td>
          </tr>
          <tr>
            <td class="description">Program:</td>
            <td>
                <?php foreach ($program as $value) {
                  if($value['id'] == $currentUser['programid']) {?>
                    <?= $value['name'] ?>
                <?php } } ?>
            </td>
            <td class="edit"><img onclick="settingsProgramHandler()" src="media/icons/edit.png"></td>
          </tr>
        </table>
        <div id="photo-section">
          <img onclick="settingsPhotoHandler()" src="media/icons/camera.png">
          <br> Upload profile picture.
        </div>

    <?php } else {
      $_SESSION['error_message'] = 'User not found!';
    }
  } ?>
