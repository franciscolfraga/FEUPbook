<?php include ('database/member.php');
include ('database/lists.php');?>
<?php function listMessages($chatid){
  $circles = getMessagesCircles($_SESSION['id']);
    if ($circles) {
      foreach($circles as $circle) {
        $members = getCircleMembers($circle['id']); ?>
      <a href="messages.php?id=<?= $circle['chatid'] ?>" onclick="post">
        <?php if($circle['chatid'] == $chatid) { ?>
            <div class="card messages highlighted">
        <?php } else { ?>
            <div class="card messages">
        <?php }?>
          <table class="message-list">
         <?php foreach($members as $member) {
           if($member['id'] != $_SESSION['id']) {
              $currentMember = getMember($member['id']);
              ?>
               <tr class="details">
                 <td class="member_pic"><img src="../<?= $currentMember['profilepic'] ?>"></td>
                 <td class="member_name"><p><p><?= $currentMember['name'] ?><p><p></td>
               </tr>
      <?php } } ?>
        </table>
        </div>
        </a>

    <?php }
        } else {
      ?><h4 id="no_groups" style="text-align: center">No groups to be displayed!</h4><?php
    }
  } ?>

  <?php function getChat($chatid){
    $entries = getChatEntries($chatid);
      if ($entries) {
        foreach($entries as $entry) {
          date_default_timezone_set('Europe/Lisbon');
          $date1 = new DateTime($entry['timest']);
          $date2 = new DateTime("now");
          $interval = $date2->diff($date1);
          if($interval->y > 0)
            $datestring = $interval->y . " years ago";
          else if($interval->m > 0)
            $datestring = $interval->y . " months ago";
          else if($interval->d > 0)
            $datestring = $interval->d . " days ago";
          else if($interval->h > 0)
            $datestring = $interval->h . " hours ago";
          else if($interval->i > 0)
            $datestring = $interval->i . " minutes ago";
          else if($interval->s > 0)
            $datestring = $interval->s . " seconds ago";
          else {
            $datestring = "Just now";
          }
          if($entry['memberid'] == $_SESSION['id']){
            ?>
            <div class="card entry">
              <table>
                <tr class="message_details">
                  <td class="message_member_pic"><a href="../profile.php?profileid=<?= $entry['memberid'] ?>" onclick="post"><img src="<?= "../".$entry['medialocation'].$entry['media_name']; ?>"></a></td>
                  <td class="message_member_name"><p><a href="../profile.php?profileid=<?= $member['memberidid'] ?>" onclick="post"><?= $entry['member_name'] ?></a><p></td>
                  <td class="message_post_date"><p><?= $datestring ?><p></td>
                </tr>
                <tr><td class="message_space" id="myborder" colspan="3"><p></td></tr>
                <tr class="message_post_text">
                  <td colspan="3"><?= $entry['message'] ?></td>
                </tr>
              </table>
            </div>
        <?php  } else { ?>
          <div class="card entry foreign">
            <table>
              <tr class="message_details">
                <td class="message_member_pic"><a href="../profile.php?profileid=<?= $entry['memberid'] ?>" onclick="post"><img src="<?= "../".$entry['medialocation'].$entry['media_name']; ?>"></a></td>
                <td class="message_member_name"><p><a href="../profile.php?profileid=<?= $member['memberidid'] ?>" onclick="post"><?= $entry['member_name'] ?></a><p></td>
                <td class="message_post_date"><p><?= $datestring ?><p></td>
              </tr>
              <tr><td class="message_space" id="myborder" colspan="3"><p></td></tr>
              <tr class="message_post_text">
                <td colspan="3"><?= $entry['message'] ?></td>
              </tr>
            </table>
          </div>
      <?php } }
          } else {
        ?><h4 id="no_groups" style="text-align: center">No messages in this chat!</h4><?php
      }
    } ?>
