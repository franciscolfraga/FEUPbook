<head>
  <link rel="stylesheet" type="text/css" href="../css/sticky-bar.css">
</head>
<div class="bar-container">
  <table class="sticky-bar">
    <tr>
      <td id="feed-col">
        <a href="../index.php"><img id="feed-pic" src="media/icons/feed.png"></a
      </td>
      <td id="img-col">
        <a href="../profile.php"><img id="profile-pic" src="<?php echo $_SESSION['profilepic']?>"></a>
      </td>
      <td id="name-col">
        <a href="profile.php"><?php echo $_SESSION['name']?></a>
      </td>
      </td>
      <td id="search-col">
        <form method="post" action="#" id="search-bar">
          <input type="text" name="search" placeholder="Search">
        </form>
      </td>
      <td>
        <a href="#"><img src="media/icons/groups.png"></a>
      </td>
      <td>
        <a href="#"><img src="media/icons/messages.png"></a>
      </td>
      <td>
        <a href="settings.php"><img src="media/icons/settings.png"></a>
      </td>
      <td>
        <a href="/actions/logout.php"><img src="media/icons/logout.png"></a>
      </td>
    </tr>
  </table>
</div>
