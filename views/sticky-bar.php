<head>
  <link rel="stylesheet" type="text/css" href="../css/sticky-bar.css">
</head>
<div class="bar-container">
  <table class="sticky-bar">
    <tr>
      <td id="user-col">
        <a href="#">
          <table id="user-table">
            <tr>
              <td id="img-col"><img src="img/user.png"></td>
              <td><?php echo $_SESSION['name'] ?></td>
            </tr>
          </table>
        </a>
      </td>
      <td>
        <a href="#">Profile</a>
      </td>
      <td>
        <a href="#">Groups</a>
      </td>
      <td>
        <a href="#">Messages</a>
      </td>
      <td>
        <a href="#">Settings</a>
      </td>
      <td>
        <a href="/actions/logout.php">Logout</a>
      </td>
    </tr>
  </table>
</div>
