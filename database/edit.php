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

      //if user is no longer a student he has no program anymore
      if($membertypeid != 1){
        $checkMemberProgram = $conn->prepare('SELECT partof.circleid AS circleid
                                              FROM member JOIN
                                                   partof ON ? = partof.memberid JOIN
                                                   circle ON partof.circleid = circle.id JOIN
                                                   program ON program.circleid = circle.id');
        $checkMemberProgram->execute(array($memberid));
        $toremove = $checkMemberProgram->fetch();
        $update = $conn->prepare('DELETE FROM partof WHERE memberid = ? AND circleid = ?');
        $update->execute(array($memberid ,$toremove['circleid']));
      }

      //if user is no longer a employee/professor his department is reset
      if($membertypeid == 1){
        $checkMemberDep = $conn->prepare('SELECT partof.circleid AS circleid
                                          FROM member JOIN
                                               partof ON ? = partof.memberid JOIN
                                               circle ON partof.circleid = circle.id JOIN
                                               department ON department.circleid = circle.id');
        $checkMemberDep->execute(array($memberid));
        $toremove = $checkMemberDep->fetch();
        $update = $conn->prepare('DELETE FROM partof WHERE memberid = ? AND circleid = ?');
        $update->execute(array($memberid ,$toremove['circleid']));
      }

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

      //update the circle of the program department too
      $getProgramDepId = $conn->prepare('SELECT * FROM program WHERE id = ?');
      $getProgramDepId->execute(array($programid));
      $toChange = $getProgramDepId->fetch();

      if(departmentEdit($toChange['deptid'], $memberid)){
        if($toremove){
          $update = $conn->prepare('UPDATE partof SET circleid = ? WHERE memberid = ? AND circleid = ?');
          return $update->execute(array($toinsert['circleid'], $memberid ,$toremove['circleid']));
        } else {
          $insertion = $conn->prepare('INSERT INTO partof (memberid, circleid) VALUES (?, ?)');
          return $insertion->execute(array($memberid, $toinsert['circleid']));
        }
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

  function profilepicEdit($name, $memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT * FROM member WHERE id = ?');
      $stmt->execute(array($memberid));
      $member = $stmt->fetch();

      if( $member['profilepic'] != 1 ){
        $update = $conn->prepare('UPDATE media SET name = ? WHERE id = ?');
        return $update->execute(array($name, $member['profilepic']));
      } else {
        $insertion = $conn->prepare('INSERT INTO media (name, typeid) VALUES (?, ?)');
        $insertion->execute(array($name, 2));
        $stmt = $conn->prepare('SELECT * FROM media WHERE name = ?');
        $stmt->execute(array($name));
        $pic = $stmt->fetch();
        $update = $conn->prepare('UPDATE member SET profilepic = ? WHERE id = ?');
        return $update->execute(array($pic['id'],$memberid));
      }
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }
  ?>
