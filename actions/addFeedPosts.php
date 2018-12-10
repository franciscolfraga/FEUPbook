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
          <?php $member = getMemberFromPost($post['memberid']); ?>
          <table>
            <tr class="details">
              <td class="member_pic"><img onclick="#" src="<?= $member['profilepic'] ?>"></td>
              <td class="member_name"><p><?= $member['name'] ?><p></td>
            </tr>
            <tr><td class="space" id="myborder" colspan="2"><p></td></tr>
            <tr><td class="space" colspan="2"><p></td></tr>
            <tr class="post_text">
              <td colspan="2"><?= $post['message'] ?></td>
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
