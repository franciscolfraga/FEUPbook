<?php
  include ('database/user.php');
  include ('database/lists.php');
  function settingsCard($id){
    $currentUser = getUser($id);
    $currentEntity = getEntity($id);
    $program = getProgram($id);
    $department = getDepartment($id);
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
                <?= $currentEntity['name'] ?>
            </td>
            <td class="edit"><img onclick="settingsEntityHandler()" src="media/icons/edit.png"></td>
          </tr>
          <?php if(isset($_SESSION['entityid'])){ ?>
            <?php if($_SESSION['entityid'] == 1){ ?>
              <tr>
                <td class="description">Program:</td>
                <td>
                    <?= $program['name'] ?>
                </td>
                <td class="edit"><img onclick="settingsProgramHandler()" src="media/icons/edit.png"></td>
              </tr>
            <?php } ?>
            <?php if($_SESSION['entityid'] > 1 ){ ?>
            <tr>
              <td class="description">Department:</td>
              <td>
                  <?= $department['name'] ?>
              </td>
              <td class="edit"><img onclick="settingsDepartmentHandler()" src="media/icons/edit.png"></td>
            </tr>
          <?php } }?>
        </table>
        <div id="photo-section">
          <img onclick="settingsPhotoHandler()" src="media/icons/camera.png">
          <br> Upload profile picture.
        </div>

    <?php } else {
      $_SESSION['error_message'] = 'User not found!';
    }
  } ?>
