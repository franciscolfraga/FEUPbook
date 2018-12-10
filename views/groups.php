<?php include ('database/member.php');
include ('database/lists.php');?>
<?php function listGroups(){
    $groups = getGroups($_SESSION['id']);
    if ($groups) {
      foreach($groups as $group) {
        $members = getCircleMembers($group['circleid']);
        $posts = getCirclePosts($group['circleid']);?>
          <div class="card groups" id="groups-<?= $i ?>">
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
    <?php }
        } else {
      $_SESSION['error_message'] = 'Groups not found!';
    }
  } ?>
