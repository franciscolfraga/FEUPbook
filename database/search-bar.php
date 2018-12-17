<?php

  // LIST DEPARTMENTS

  function getDepartmentsByPartialNameOrInitials($search) {
    global $conn;

    $query = 'SELECT id, name, initials FROM department WHERE name ILIKE ? OR initials ILIKE ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array('%' . $search . '%', '%' . $search . '%'));
    return $stmt->fetchAll();
  }

  // PROGRAMS

  function getProgramsByPartialNameOrInitials($search) {
    global $conn;

    $query = 'SELECT id, name, initials FROM program WHERE name ILIKE ? OR initials ILIKE ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array('%' . $search . '%', '%' . $search . '%'));
    return $stmt->fetchAll();
  }

  // COURSES

  function getCoursesByPartialNameOrInitials($search) {
    global $conn;

    $query = 'SELECT id, name, initials, year FROM course WHERE name ILIKE ? OR initials ILIKE ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array('%' . $search . '%', '%' . $search . '%'));
    return $stmt->fetchAll();
  }

  // CLASSES

  function getClassesByPartialReference($search) {
    global $conn;

    $query = 'SELECT id, reference FROM class WHERE reference ILIKE ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array('%' . $search . '%'));
    return $stmt->fetchAll();
  }

  // MEMBERS

  function getMembersByPartialName($search) {
    global $conn;

    $query = 'SELECT id, name, email, membertypeid, profilepic FROM member WHERE name ILIKE ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array('%' . $search . '%'));
    return $stmt->fetchAll();
  }

?>
