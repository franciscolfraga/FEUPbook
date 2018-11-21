<head>
  <link rel="stylesheet" type="text/css" href="../css/sticky-bar.css">
</head>
<div class="bar-container">
  <table class="sticky-bar">
    <tr>
      <td id="img-col">
        <img id="profile-pic" src="img/user.png">
      </td>
      <td id="name-col">
        <?php echo $_SESSION['name'] ?>
      </td>
      </td>
      <td id="search-col">
        <form method="post" action="#" id="search-bar">
          <input type="text" name="search" placeholder="Search">
        </form>
      </td>
      <td>
        <a href="#"><img src="img/icons/groups.png"></a>
      </td>
      <td>
        <a href="#"><img src="img/icons/messages.png"></a>
      </td>
      <td>
        <a href="#"><img src="img/icons/settings.png"></a>
      </td>
      <td>
        <a href="/actions/logout.php"><img src="img/icons/logout.png"></a>
      </td>
    </tr>
  </table>
</div>
