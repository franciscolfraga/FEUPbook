<?php

  // LIST DEPARTMENTS

  function getDepartmentsByPartialNameOrInitials($search) {
    global $conn;

    if (!is_array($search)) {
      $query = 'SELECT id, name, initials
                FROM department
                WHERE name ILIKE ? OR initials ILIKE ?';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search . '%', '%' . $search . '%'));
    } else {
      if ($search[0] === 'NOT') {
        $search[0] = 'AND NOT';
      }

      $query = 'SELECT id, name, initials, circleid
                FROM department
                WHERE (name ILIKE ? OR initials ILIKE ?) ' . $search[0] . ' (name ILIKE ? OR initials ILIKE ?)';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search[1] . '%', '%' . $search[1] . '%', '%' . $search[2] . '%', '%' . $search[2] . '%'));
    }

    return $stmt->fetchAll();
  }

  // LIST PROGRAMS

  function getProgramsByPartialNameOrInitials($search) {
    global $conn;

    if (!is_array($search)) {
      $query = 'SELECT id, name, initials, circleid
                FROM program
                WHERE name ILIKE ? OR initials ILIKE ?';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search . '%', '%' . $search . '%'));
    } else {
      if ($search[0] === 'NOT') {
        $search[0] = 'AND NOT';
      }

      $query = 'SELECT id, name, initials
                FROM program
                WHERE (name ILIKE ? OR initials ILIKE ?) ' . $search[0] . ' (name ILIKE ? OR initials ILIKE ?)';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search[1] . '%', '%' . $search[1] . '%', '%' . $search[2] . '%', '%' . $search[2] . '%'));
    }

    return $stmt->fetchAll();
  }

  // LIST COURSES

  function getCoursesByPartialNameOrInitials($search) {
    global $conn;

    if (!is_array($search)) {
      $query = 'SELECT id, name, initials, year, circleid
                FROM course
                WHERE name ILIKE ? OR initials ILIKE ?';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search . '%', '%' . $search . '%'));
    } else {
      if ($search[0] === 'NOT') {
        $search[0] = 'AND NOT';
      }

      $query = 'SELECT id, name, initials, year, circleid
                FROM course
                WHERE (name ILIKE ? OR initials ILIKE ?) ' . $search[0] . ' (name ILIKE ? OR initials ILIKE ?)';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search[1] . '%', '%' . $search[1] . '%', '%' . $search[2] . '%', '%' . $search[2] . '%'));
    }

    return $stmt->fetchAll();
  }

  // LIST CLASSES

  function getClassesByPartialReference($search) {
    global $conn;

    if (!is_array($search)) {
      $query = 'SELECT id, reference, circleid
                FROM class
                WHERE reference ILIKE ?';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search . '%'));
    } else {
      if ($search[0] === 'NOT') {
        $search[0] = 'AND NOT';
      }

      $query = 'SELECT id, reference, circleid
                FROM class
                WHERE reference ILIKE ? ' . $search[0] . ' reference ILIKE ?';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search[1] . '%', '%' . $search[2] . '%'));
    }

    return $stmt->fetchAll();
  }

  // LIST MEMBERS

  function getMembersByPartialName($search) {
    global $conn;

    if (!is_array($search)) {
      $query = 'SELECT id, name, email, membertypeid, profilepic
                FROM member
                WHERE name ILIKE ?';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search . '%'));
    } else {
      if ($search[0] === 'NOT') {
        $search[0] = 'AND NOT';
      }

      $query = 'SELECT id, name, email, membertypeid, profilepic
                FROM member
                WHERE name ILIKE ? ' . $search[0] . ' name ILIKE ?';

      $stmt = $conn->prepare($query);
      $stmt->execute(array('%' . $search[1] . '%', '%' . $search[2] . '%'));
    }

    return $stmt->fetchAll();
  }


?>
