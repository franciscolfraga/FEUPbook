<?php
  function createMember($name, $email, $password) {
    try {
      global $conn;
      if( $conn === null) return false;
      $options = [
          'cost' => 12,
      ];

      $hash = password_hash ($password , PASSWORD_DEFAULT, $options);

      $stmt = $conn->prepare('INSERT INTO member (name, email, password, profilepic) VALUES (?, ?, ?, ?)');
      return $stmt->execute(array($name, $email, $hash, 1));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getMember($id) {
      try {
        global $conn;
        if( $conn === null) return false;

        $stmt = $conn->prepare('SELECT member.name AS name, member.email AS email, member.id AS id, member.password AS password, media.name AS pic , mediatype.location AS location
                                FROM member JOIN media ON member.profilepic = media.id
                                JOIN mediatype ON media.typeid = mediatype.id
                                WHERE member.id = ? ');

        $stmt->execute(array($id));

        $mail = $stmt->fetch();

        $_SESSION['name'] = $mail['name'];
        $_SESSION['id'] = $mail['id'];

        $mail['profilepic'] = $mail['location'].''.$mail['pic'];
        $_SESSION['profilepic'] = $mail['location'].''.$mail['pic'];

        $stmt = $conn->prepare('SELECT membertype.id AS membertypeid
                                FROM member
                                JOIN membertype ON member.membertypeid = membertype.id
                                WHERE member.id = ?');
        $stmt->execute(array($id));

        $membertype = $stmt->fetch();

        if($membertype['membertypeid']){
          $_SESSION['membertypeid'] = $membertype['membertypeid'];
          $mail['membertypeid'] = $membertype['membertypeid'];
        } else {
          $mail['membertypeid'] = NULL;
        }
        $mail['programid'] = NULL;
        $mail['depid'] = NULL;
        $dep = getDepartment($mail['id']);
        if($dep) {
          $_SESSION['depid'] = $dep['id'];
          $mail['depid'] = $dep['id'];
        }

        $program = getProgram($mail['id']);
        if ($program) {
          $_SESSION['programid'] = $program['id'];
          $mail['programid'] = $program['id'];
        }
        
        return $mail;
      } catch(PDOException $ex){
        $_SESSION['db_error'] = $ex;
      }
    }

  function getMemberType($memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT membertype.name AS name FROM membertype JOIN member ON member.membertypeid = membertype.id WHERE member.id = ?');
      $stmt->execute(array($memberid));

      return $stmt->fetch();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getProgram($memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT program.name AS name, program.initials AS initials,  department.name AS department, media.name AS logo, mediatype.location AS logo_location, program.id AS id
                              FROM member JOIN partof ON member.id = partof.memberid JOIN
                                   circle ON partof.circleid = circle.id JOIN
                                   program ON program.circleid = circle.id JOIN
                                   department ON program.deptid = department.id JOIN
                                   media ON program.logo = media.id JOIN
                                   mediatype ON mediatype.id = media.typeid
                              WHERE ? = member.id');

      $stmt->execute(array($memberid));

      return $stmt->fetch();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }
  function getDepartment($memberid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT department.name AS name, department.initials AS initials, department.id AS id
                              FROM member JOIN partof ON member.id = partof.memberid JOIN
                                   circle ON partof.circleid = circle.id JOIN
                                   department ON department.circleid = circle.id
                              WHERE ? = member.id');
      $stmt->execute(array($memberid));

      return $stmt->fetch();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function isValidMember($email, $password) {
    try {
      global $conn;
      if( $conn === null) return false;
      $stmt = $conn->prepare('SELECT member.name AS name, member.id AS id, member.password AS password, media.name AS pic , mediatype.location AS location
                              FROM member JOIN media ON member.profilepic = media.id
                              JOIN mediatype ON media.typeid = mediatype.id
                              WHERE member.email = ? ');

      $stmt->execute(array($email));

      $mail = $stmt->fetch();

      $_SESSION['name'] = $mail['name'];
      $_SESSION['id'] = $mail['id'];

      $mail['profilepic'] = $mail['location'].''.$mail['pic'];
      $_SESSION['profilepic'] = $mail['location'].''.$mail['pic'];

      $stmt = $conn->prepare('SELECT membertype.id AS membertypeid
                              FROM member
                              JOIN membertype ON member.membertypeid = membertype.id
                              WHERE member.email = ?');
      $stmt->execute(array($email));

      $membertype = $stmt->fetch();

      if($membertype['membertypeid']){
        $_SESSION['membertypeid'] = $membertype['membertypeid'];
        $mail['membertypeid'] = $membertype['membertypeid'];
      }
      $mail['depid'] = NULL;
      $mail['programid'] = NULL;

      $dep = getDepartment($mail['id']);
      if($dep) {
        $_SESSION['depid'] = $dep['id'];
        $mail['depid'] = $dep['id'];
      }

      $program = getProgram($mail['id']);
      if ($program) {
        $_SESSION['programid'] = $program['id'];
        $mail['programid'] = $program['id'];
      }

      return $mail !== false && password_verify($password, $mail['password']);
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

?>
