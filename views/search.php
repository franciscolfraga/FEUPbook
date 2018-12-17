<?php
  include ('config/init.php');
  include ('database/search-bar.php');

  // Analyze input

  $pieces = explode(' ', $_GET['field'], 3); // max 3 pieces

  if (sizeof($pieces) > 2) {
    $logical = strtoupper($pieces[1]);

    if ($logical === 'AND' OR $logical === 'OR' OR $logical === 'NOT') {
      $search = array($logical, $pieces[0], $pieces[2]);
    } else {
      $search = $_GET['field'];
    }
  } else {
    $search = $_GET['field'];
  }

  // LIST DEPARTMENTS

  $rows = getDepartmentsByPartialNameOrInitials($search);

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

  // LIST PROGRAMS

  $rows = getProgramsByPartialNameOrInitials($search);

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

  // LIST COURSES

  $rows = getCoursesByPartialNameOrInitials($search);

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

  // LIST CLASSES

  $rows = getClassesByPartialReference($search);

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

  // LIST MEMBERS

  $rows = getMembersByPartialName($search);

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
