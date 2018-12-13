<?php include ('database/member.php');?>
<?php function profileCard($id){ ?>
    <?php $currentMember = getMember($id);
    if ($currentMember) { ?>
      <div id="cover"></div>
      <img id="picture" src="<?php echo $currentMember['profilepic']?>">
      <table class="profile-table">
        <tr>
          <td id="name" colspan="2">
            <h2><?= $currentMember['name'] ?></h2>
            <?php if ($currentMember['membertypeid']) {
              $membertype = getMemberType($id);?>
              <h3 id="membertype"><?= $membertype['name'] ?></h3>
            <?php } ?>
          </td>
        </tr>
        <?php if( $currentMember['id'] != $_SESSION['id']) { ?>
        <tr>
          <td><a href="../actions/chat.php?member1=<?= $_SESSION['id'] ?>&member2=<?= $currentMember['id'] ?>" onclick="post"><img id="chat-logo" src="media/icons/chat.png"></a></td>
        </tr>
        <?php }
        if (isset($currentMember['programid']) and $currentMember['membertypeid'] == 1) {
        $program = getProgram($id);?>
          <tr>
            <td><img id="program-logo" src="<?php echo $program['logo_location']."".$program['logo']; ?>"></td>
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
        <?php if (isset($currentMember['depid']) and $currentMember['membertypeid'] > 1) {
        $dep = getDepartment($id);?>
          <tr>
            <td><img id="dep-logo" src="media/icons/department.png"></td>
          </tr>
          <tr>
            <td id="dep-initials"><?= $dep['initials'] ?></td>
          </tr>
          <tr>
            <td id="dep-name"><?= $dep['name'] ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td><img id="email-logo" src="media/icons/email.png"></td>
        </tr>
        <tr>
          <td id="email-display"><h4><?= $currentMember['email'] ?></h4></td>
        </tr>
      </table>
    <?php } else {
      $_SESSION['error_message'] = 'Member not found!';
    }
  } ?>
