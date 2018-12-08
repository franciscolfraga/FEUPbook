<?php
  include ('database/member.php');
  include ('database/lists.php');
  function settingsCard($id){
    $currentMember = getMember($id);
    $currentMemberType = getMemberType($id);
    $program = getProgram($id);
    $department = getDepartment($id);
    if ($currentMember) { ?>
        <h2>Settings</h2>
        <table>
          <tr>
            <td class="description">Name:</td>
            <td><?= $currentMember['name'] ?></td>
            <td class="edit"><img onclick="settingsNameHandler()" src="media/icons/edit.png"></td>
          </tr>
          <tr>
            <td class="description">Email:</td>
            <td><?= $currentMember['email'] ?></td>
            <td class="edit"><img onclick="settingsEmailHandler()" src="media/icons/edit.png"></td>
          </tr>
          <tr>
            <td class="description">Password:</td>
            <td>********</td>
            <td class="edit"><img onclick="settingsPasswordHandler()" src="media/icons/edit.png"></td>
          </tr>
          <tr>
            <td class="description">MemberType:</td>
            <td>
                <?= $currentMemberType['name'] ?>
            </td>
            <td class="edit"><img onclick="settingsMemberTypeHandler()" src="media/icons/edit.png"></td>
          </tr>
          <?php if(isset($_SESSION['membertypeid'])){ ?>
            <?php if($_SESSION['membertypeid'] == 1){ ?>
              <tr>
                <td class="description">Program:</td>
                <td>
                    <?= $program['name'] ?>
                </td>
                <td class="edit"><img onclick="settingsProgramHandler()" src="media/icons/edit.png"></td>
              </tr>
            <?php } ?>
            <?php if($_SESSION['membertypeid'] > 1 ){ ?>
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
      $_SESSION['error_message'] = 'Member not found!';
    }
  } ?>
