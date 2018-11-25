<?php $myentity = getEntities();
$myprogram = getPrograms();?>
<div class="settings-form" id="settings-div" style="display: none;">
  <form class="centered-form" id="name-div" method="post" action="#" style="display: none;">
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
  <form class="centered-form" id="email-div" method="post" action="#" style="display: none;">
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
  <form class="centered-form" id="password-div" method="post" action="#" style="display: none;">
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
  <form class="centered-form" id="entity-div" method="post" action="#" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">Entity:</td>
        <td>
          <select name="entities">
            <?php foreach ($myentity as $value) {
              if($value['id'] == $currentUser['entityid']) {?>
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
  <form class="centered-form" id="program-div" method="post" action="#" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <table>
      <tr>
        <td class="description">Program:</td>
        <td>
          <select name="programs">
            <?php foreach ($myprogram as $value) {
              if($value['id'] == $currentUser['programid']) {?>
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
  <form class="centered-form" id="upload-photo" enctype="multipart/form-data" method="post" action="#" style="display: none;">
    <img class ="leave" onclick="leaveHandler()" src="media/icons/leave.png">
    <input type="hidden" name="prod_id" value="<?=$prod_id?>">
    <label> Upload profile picture: <br>
      <input type="file" name="photo">
    </label>
    <br>
    <label>
      <input type="Submit" value="Submit">
    </label>
  </form>
</div>
