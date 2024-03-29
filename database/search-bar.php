<?php

  // 4 SPECIFIC MEMBER

  function getMemberByEmail($email) {
    global $conn;

    $query = 'SELECT member.id, member.name, member.email, member.membertypeid, member.profilepic
             FROM member
             WHERE member.email = ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));
    return $stmt->fetchAll();
  }

  function getDepartmentByEmail($email) {
    global $conn;

    $query = 'SELECT department.id, department.name, department.initials, department.circleid
             FROM member JOIN
                  partof ON member.id = partof.memberid JOIN
                  department ON partof.circleid = department.circleid
             WHERE member.email = ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));
    return $stmt->fetchAll();
  }

  function getProgramByEmail($email) {
    global $conn;

    $query = 'SELECT program.id, program.name, program.initials, program.circleid
             FROM member JOIN
                  partof ON member.id = partof.memberid JOIN
                  program ON partof.circleid = program.circleid
             WHERE member.email = ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));
    return $stmt->fetchAll();
  }

  function getCoursesByEmail($email) {
    global $conn;

    $query = 'SELECT course.id, course.name, course.initials, course.year, course.circleid
             FROM member JOIN
                  partof ON member.id = partof.memberid JOIN
                  course ON partof.circleid = course.circleid
             WHERE member.email = ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));
    return $stmt->fetchAll();
  }

  function getClassesByEmail($email) {
    global $conn;

    $query = 'SELECT class.id, class.reference, class.circleid
             FROM member JOIN
                  partof ON member.id = partof.memberid JOIN
                  class ON partof.circleid = class.circleid
             WHERE member.email = ?';

    $stmt = $conn->prepare($query);
    $stmt->execute(array($email));
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

  // LIST DEPARTMENTS

  function getDepartmentsByPartialNameOrInitials($search) {
    global $conn;

    if (!is_array($search)) {
      $query = 'SELECT id, name, initials, circleid
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

      $query = 'SELECT id, name, initials, circleid
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

?>
