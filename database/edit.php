<?php
  function nameEdit($name, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE member SET name = ? WHERE id = ?');
      return $stmt->execute(array($name, $memberid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function emailEdit($email, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE member SET email = ? WHERE id = ?');
      return $stmt->execute(array($email, $memberid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function passwordEdit($password, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;
      $options = [
          'cost' => 12,
      ];
      $hash = password_hash ($password , PASSWORD_DEFAULT, $options);
      $stmt = $conn->prepare('UPDATE member SET password = ? WHERE id = ?');
      return $stmt->execute(array($hash, $memberid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function memberTypeEdit($membertypeid, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE member SET membertypeid = ? WHERE id = ?');
      return $stmt->execute(array($membertypeid, $memberid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function programEdit($programid, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $checkMemberProgram = $conn->prepare('SELECT partof.circleid AS circleid
                                            FROM member JOIN
                                                 partof ON ? = partof.memberid JOIN
                                                 circle ON partof.circleid = circle.id JOIN
                                                 program ON program.circleid = circle.id');
      $checkMemberProgram->execute(array($memberid));
      $toremove = $checkMemberProgram->fetch();

      $getCircleFromProgram = $conn->prepare('SELECT circleid FROM program WHERE id = ?');
      $getCircleFromProgram->execute(array($programid));
      $toinsert = $getCircleFromProgram->fetch();

      if($toremove){
        $update = $conn->prepare('UPDATE partof SET circleid = ? WHERE memberid = ? AND circleid = ?');
        return $update->execute(array($toinsert['circleid'], $memberid ,$toremove['circleid']));
      } else {
        $insertion = $conn->prepare('INSERT INTO partof (memberid, circleid) VALUES (?, ?)');
        return $insertion->execute(array($memberid, $toinsert['circleid']));
      }
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function departmentEdit($depid, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;
      $checkMemberDep = $conn->prepare('SELECT partof.circleid AS circleid
                                        FROM member JOIN
                                             partof ON ? = partof.memberid JOIN
                                             circle ON partof.circleid = circle.id JOIN
                                             department ON department.circleid = circle.id');
      $checkMemberDep->execute(array($memberid));
      $toremove = $checkMemberDep->fetch();

      $getCircleFromDep = $conn->prepare('SELECT circleid FROM department WHERE id = ?');
      $getCircleFromDep->execute(array($depid));
      $toinsert = $getCircleFromDep->fetch();

      if($checkMemberDep){
        $update = $conn->prepare('UPDATE partof SET circleid = ? WHERE memberid = ? AND circleid = ?');
        return $update->execute(array($toinsert['circleid'], $memberid ,$toremove['circleid']));
      } else {
        $insertion = $conn->prepare('INSERT INTO partof (memberid, circleid) VALUES (?, ?)');
        return $insertion->execute(array($memberid, $toinsert['circleid']));
      }
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function profilepicEdit($name, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $member = $conn->prepare('SELECT * FROM member WHERE id = ?');
      $toremove = $member->execute(array($memberid));

      if( $member['profilepic'] != 1 ){
        $update = $conn->prepare('UPDATE name FROM media WHERE id = ?');
        return $update->execute(array($member['profilepic']));
      } else {
        $insertion = $conn->prepare('INSERT INTO media (name, typeid) VALUES (?, ?)');
        return $insertion->execute(array($name, 2));
      }
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }
  ?>
