<?php
  include ('config/init.php');
  include ('database/search-bar.php');

  // List departments

  $rows = getDepartmentsByPartialNameOrInitials($_GET['field']);

  if ($rows) {
    echo '<table>';
    echo '<caption>Departments</caption>';
    echo '<tr><th>name</th><th>initials</th></tr>';
    foreach($rows as $row) {
      echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['initials'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  }

  // List programs

  $rows = getProgramsByPartialNameOrInitials($_GET['field']);

  if ($rows) {
    echo '<table>';
    echo '<caption>Programs</caption>';
    echo '<tr><th>name</th><th>initials</th></tr>';
    foreach($rows as $row) {
      echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['initials'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  }

  // List courses

  $rows = getCoursesByPartialNameOrInitials($_GET['field']);

  if ($rows) {
    echo '<table>';
    echo '<caption>Courses</caption>';
    echo '<tr><th>name</th><th>initials</th><th>year</th></tr>';
    foreach($rows as $row) {
      echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['initials'] . '</td>';
      echo '<td>' . $row['year'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  }

  // List classes

  $rows = getClassesByPartialReference($_GET['field']);

  if ($rows) {
    echo '<table>';
    echo '<caption>Classes</caption>';
    echo '<tr><th>reference</th></tr>';
    foreach($rows as $row) {
      echo '<tr>';
      echo '<td>' . $row['reference'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  }

  // List members

  $rows = getMembersByPartialName($_GET['field']);

  if ($rows) {
    echo '<table>';
    echo '<caption>Members</caption>';
    echo '<tr><th>name</th><th>email</th><th>membertypeid</th><th>profilepic</th></tr>';
    foreach($rows as $row) {
      echo '<tr>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['email'] . '</td>';
      echo '<td>' . $row['membertypeid'] . '</td>';
      echo '<td>' . $row['profilepic'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  }

?>
