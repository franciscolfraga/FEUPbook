<?php include ('database/member.php');
include ('database/lists.php');?>
<?php function listGroups(){
    $groups = getGroups($_SESSION['id']);
    if ($groups) {
      foreach($groups as $group) {
        $members = getCircleMembers($group['circleid']);
        $posts = getCirclePosts($group['circleid']);?>
        <a href="../groupview.php?groupid=<?= $group['circleid'] ?>" onclick="post">
          <div class="card groups">
            <p><h3><?= $group['name'] ?> Group</h3><p>
              <table>
                <tr>
                  <td><h4><?php echo count($members)." members" ?></h4></td>
                </tr>
                <tr>
                  <td><h4><?php echo count($posts)." posts" ?></h4></td>
                </tr>
              </table>
          </div>
        </a>
    <?php }
        } else {
      ?><h4 id="no_groups">No groups to be displayed!</h4><?php
    }
  } ?>
