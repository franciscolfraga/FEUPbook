<head>
  <!--All css inherent to this file.-->
  <link rel="stylesheet" type="text/css" href="../css/sticky-bar.css">
</head>
<!--This div was created with the purpose of limiting the sticky-bar area.-->
<div class="bar-container">
  <table class="sticky-bar">
    <tr>
      <!--Sticky-bar anchor to the session page.-->
      <td id="feed-col">
        <a href="../index.php"><img id="feed-pic" src="media/icons/feed.png"></a>
      </td>
      <!--Sticky-bar anchor to the profile.php page.-->
      <td id="img-col">
        <a href="../profile.php"><img id="profile-pic" src="<?php echo $_SESSION['profilepic']?>"></a>
      </td>
      <!--Sticky-bar anchor to the profile.php page-->
      <td id="name-col">
        <a href="../profile.php"><?php echo $_SESSION['name']?></a>
      </td>
      <!--Sticky-bar search section. Not functional yet.-->
      <td id="search-col">
        <form method="post" action="#" id="search-bar">
          <input type="text" name="search" placeholder="Search">
        </form>
      </td>
      <td>
        <a href="../news.php"><img src="media/icons/news.png"></a>
      </td>
      <!--Sticky-bar anchor to the groups section. Not functional yet.-->
      <td>
        <a href="#"><img src="media/icons/groups.png"></a>
      </td>
      <!--Sticky-bar anchor to the messages section. Not functional yet.-->
      <td>
        <a href="#"><img src="media/icons/messages.png"></a>
      </td>
      <!--Sticky-bar anchor to the settings section.-->
      <td>
        <a href="settings.php"><img src="media/icons/settings.png"></a>
      </td>
      <!--Sticky-bar anchor to the logout action. It will perform all the
          actions coded in the /actions/logout.php file.-->
      <td>
        <a href="/actions/logout.php"><img src="media/icons/logout.png"></a>
      </td>
    </tr>
  </table>
</div>
