<?php include ('database/member.php');
include ('database/lists.php');?>
<?php function listMessages(){
    $circles = getMessagesCircles($_SESSION['id']);
    if ($circles) {
      foreach($circles as $circle) {
        $members = getCircleMembers($circle['id']); ?>
        <div class="card messages">
          <table class="message-list">
         <?php foreach($members as $member) {
           if($member['id'] != $_SESSION['id']) {
              $currentMember = getMember($member['id']);
              ?>
             <a href="#">
               <tr class="details">
                 <td class="member_pic"><img src="../<?= $currentMember['profilepic'] ?>"></td>
                 <td class="member_name"><p><p><?= $currentMember['name'] ?><p><p></td>
               </tr>
             </a>
      <?php } } ?>
        </table>
        </div>
    <?php }
        } else {
      ?><h4 id="no_groups">No groups to be displayed!</h4><?php
    }
  } ?>
