<?php
include ('../config/init.php');
include ('../database/lists.php');
include ('../database/member.php');
function load_feed($start){
  $my_posts=getPosts();
  if($my_posts){
    $i = 0;
    foreach($my_posts as $post) {
      if( $i >= $start){?>
      <div class="card posts" id="posts-<?= $i ?>">
        <div class="posts-container">
          <?php $member = getMemberFromPost($post['memberid']);
          date_default_timezone_set('Europe/Lisbon');
          $date1 = new DateTime($post['timest']);
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
            $datestring = $interval->s . " seconds ago";
          }

          ?>
          <table>
            <tr class="details">
              <td class="member_pic"><a href="../profile.php?profileid=<?= $member['id'] ?>" onclick="post"><img src="<?= $member['profilepic'] ?>"></a></td>
              <td class="member_name"><p><a href="../profile.php?profileid=<?= $member['id'] ?>" onclick="post"><?= $member['name'] ?></a><p></td>
              <td class="post_date"><p><?= $datestring ?><p></td>
            </tr>
            <tr><td class="space" id="myborder" colspan="3"><p></td></tr>
            <tr><td class="space" colspan="3"><p></td></tr>
            <tr class="post_text">
              <td colspan="3"><?= $post['message'] ?></td>
            </tr>
          </table>

        </div>
      </div>
    <?php }
      if (++$i == $start + 4) break;
    }
  } else {
    $_SESSION['error_message'] = 'Could not load posts!';
    die(header('Location: ../index.php'));
  }
}

if (isset($_POST['start'])) {
        echo load_feed($_POST['start']);
    }
?>
