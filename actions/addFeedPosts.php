<?php
include ('../config/init.php');
include ('../database/lists.php');
include ('../database/member.php');
function load_feed($start, $circleid){
  $my_posts=getPosts($circleid);
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
            $datestring = "Just now";
          }

          ?>
          <table>
            <tr class="details">
              <td class="member_pic"><a href="profile.php?profileid=<?= $member['id'] ?>" onclick="post"><img src="<?= $member['profilepic'] ?>"></a></td>
              <td class="member_name"><p><a href="profile.php?profileid=<?= $member['id'] ?>" onclick="post"><?= $member['name'] ?></a><p></td>
              <td class="post_date"><p><?= $datestring ?><p></td>
            </tr>
            <tr><td class="space" id="myborder" colspan="3"><p></td></tr>
            <tr><td class="space" colspan="3"><p></td></tr>
            <tr class="post_text">
              <td colspan="3"><?= $post['message'] ?></td>
            </tr>
            <?php if($post['mediatype'] != NULL) { ?>
            <tr class="post_file">
              <?php if( $post['mediatype'] == 'Post Pics') { ?>
                <td colspan="3"><p><img id="post-pic" src=<?= "".$post['medialocation']."".$post['medianame'] ?>></td>
              <?php } else if( $post['mediatype'] == 'Post Audio') {
                  $mime = mime_content_type ( "../".$post['medialocation']."".$post['medianame'] );?>
                  <td colspan="3">
                    <p></p>
                    <audio controls>
                      <source src=<?= "".$post['medialocation']."".$post['medianame'] ?> type=<?= $mime ?>>
                      Your browser does not support the audio element.
                    </audio>
                  </td>
                <?php } else if( $post['mediatype'] == 'Post Video') {
                    $mime = mime_content_type ( "".$post['medialocation']."".$post['medianame'] );?>
                    <td colspan="3">
                      <p></p>
                      <video controls>
                        <source src=<?= "".$post['medialocation']."".$post['medianame'] ?> type=<?= $mime ?>>
                        Your browser does not support the audio element.
                      </video>
                    </td>
                  <?php } else if( $post['mediatype'] == 'Post Other') {
                      $mime = mime_content_type ( "".$post['medialocation']."".$post['medianame'] );?>
                      <td colspan="3">
                        <p></p>
                        <a href=<?= "".$post['medialocation']."".$post['medianame']?> onclick="post">Download file</a>
                      </td>
                  <?php } ?>
            </tr>
          <?php } ?>
          </table>

        </div>
      </div>
    <?php }
      if (++$i == $start + 4) break;
    }
  } else {

  }
}

if (isset($_POST['start'], $_POST['circleid'])) {
        echo load_feed($_POST['start'], $_POST['circleid']);
    }
?>
