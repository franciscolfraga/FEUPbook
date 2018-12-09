<?php $mymembertype = getMemberTypes();
$myprogram = getPrograms();
$mydepartment = getDepartments();?>
<div class="settings-form" id="settings-div" style="display: none;">
  <form class="centered-form" id="name-div" method="post" action="actions/edit/name.php" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">Name:</td>
        <td><input type="text" name="name" placeholder="Name"></td>
      </tr>
      <tr>
        <td colspan="2" class="my-button"><label>
          <input type="submit" value="Submit">
        </label></td>
      </tr>
  </table>
  </form>
  <form class="centered-form" id="email-div" method="post" action="actions/edit/email.php" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">Email:</td>
        <td><input type="email" name="email" placeholder="Email"></td>
      </tr>
      <tr>
        <td colspan="2" class="my-button"><label>
          <input type="submit" value="Submit">
        </label></td>
      </tr>
  </table>
  </form>
  <form class="centered-form" id="password-div" method="post" action="actions/edit/password.php" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">Old password:</td>
        <td><input type="password" name="oldpassword" placeholder="Password"></td>
      </tr>
      <tr>
        <td class="description">New password:</td>
        <td><input type="password" name="newpassword" placeholder="Password"></td>
      </tr>
      <tr>
        <td colspan="2" class="my-button"><label>
          <input type="submit" value="Submit">
        </label></td>
      </tr>
  </table>
  </form>
  <form class="centered-form" id="membertype-div" method="post" action="actions/edit/membertype.php" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">MemberType:</td>
        <td>
          <select name="membertypes">
            <?php foreach ($mymembertype as $value) {
              if($value['id'] == $currentMember['membertypeid']) {?>
                <option value="<?= $value['name'] ?>" selected><?= $value['name'] ?></option>
            <?php } else{ ?>
                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
            <?php } } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="my-button"><label>
          <input type="submit" value="Submit">
        </label></td>
      </tr>
  </table>
  </form>
  <form class="centered-form" id="program-div" method="post" action="actions/edit/program.php" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">Program:</td>
        <td>
          <select name="programs">
            <?php foreach ($myprogram as $value) {
              if($value['id'] == $currentMember['programid']) {?>
                <option value="<?= $value['name'] ?>" selected><?= $value['name'] ?></option>
            <?php } else{ ?>
                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
            <?php } } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="my-button"><label>
          <input type="submit" value="Submit">
        </label></td>
      </tr>
  </table>
  </form>
  <form class="centered-form" id="department-div" method="post" action="actions/edit/department.php" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">Department:</td>
        <td>
          <select name="departments">
            <?php foreach ($mydepartment as $value) {
              if($value['id'] == $currentMember['depid']) {?>
                <option value="<?= $value['name'] ?>" selected><?= $value['name'] ?></option>
            <?php } else{ ?>
                <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
            <?php } } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="my-button"><label>
          <input type="submit" value="Submit">
        </label></td>
      </tr>
  </table>
  </form>
  <form class="centered-form" id="upload-photo" enctype="multipart/form-data" method="post" action="actions/edit/profilepic.php" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <input type="hidden" name="img_name" value="<?= $img_name ?>">
    <label> Upload profile picture: <br>
      <input type="file" name="photo" id="fileToUpload">
    </label>
    <br>
    <label>
      <input type="Submit" value="Submit" name="submitPhoto">
    </label>
  </form>
</div>
