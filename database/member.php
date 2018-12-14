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

        $mail['profilepic'] = $mail['location'].''.$mail['pic'];

        $stmt = $conn->prepare('SELECT membertype.id AS membertypeid
                                FROM member
                                JOIN membertype ON member.membertypeid = membertype.id
                                WHERE member.id = ?');
        $stmt->execute(array($id));

        $membertype = $stmt->fetch();

        if($membertype['membertypeid']){
          $mail['membertypeid'] = $membertype['membertypeid'];
        } else {
          $mail['membertypeid'] = NULL;
        }
        $mail['programid'] = NULL;
        $mail['depid'] = NULL;
        $dep = getDepartment($mail['id']);
        if($dep) {
          $mail['depid'] = $dep['id'];
        }

        $program = getProgram($mail['id']);
        if ($program) {
          $mail['programid'] = $program['id'];
        }

        return $mail;
      } catch(PDOException $ex){
        $_SESSION['db_error'] = $ex;
      }
    }


  function getMemberFromPost($id) {
      try {
        global $conn;
        if( $conn === null) return false;

        $stmt = $conn->prepare('SELECT member.name AS name, member.email AS email, member.id AS id, member.password AS password, media.name AS pic , mediatype.location AS location
                                FROM member JOIN media ON member.profilepic = media.id
                                JOIN mediatype ON media.typeid = mediatype.id
                                WHERE member.id = ? ');

        $stmt->execute(array($id));

        $mail = $stmt->fetch();

        $mail['profilepic'] = $mail['location'].''.$mail['pic'];

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

  function postInsertion($postText, $memberid, $circleid) {
    try {
      global $conn;
      if( $conn === null) return false;
      date_default_timezone_set('Europe/Lisbon');
      $timestamp = date('Y-m-d G:i:s');

      $stmt = $conn->prepare('INSERT INTO post (timest, message, memberid) VALUES (?, ?, ?) RETURNING id');
      $stmt->execute(array($timestamp, $postText, $memberid));
      $post = $stmt->fetch();

      $ok = $conn->prepare('INSERT INTO postedin (postid, circleid) VALUES (?, ?)');
      $ok->execute(array($post['id'], $circleid));

      return $stmt && $ok;
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function chatInsertion($postText, $memberid, $chatid) {
    try {
      global $conn;
      if( $conn === null) return false;
      date_default_timezone_set('Europe/Lisbon');
      $timestamp = date('Y-m-d G:i:s');

      $stmt = $conn->prepare('INSERT INTO chatentry (timest, message, chatid, memberid) VALUES (?, ?, ?, ?)');
      return $stmt->execute(array($timestamp, $postText, $chatid, $memberid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getGroups( $memberid ) {
    try {
      global $conn;
      if( $conn === null) return false;


      #add more types of circles...
      $stmt = $conn->prepare('SELECT partof.memberid, partof.circleid, circletype.name AS circletype, department.name FROM partof
                              JOIN circle ON partof.circleid = circle.id
                              JOIN circletype ON circle.typeid = circletype.id
                              JOIN department ON circle.id = department.circleid
                              WHERE memberid = ? AND typeid=1
                              UNION
                              SELECT partof.memberid, partof.circleid, circletype.name AS circletype, program.name FROM partof
                              JOIN circle ON partof.circleid = circle.id
                              JOIN circletype ON circle.typeid = circletype.id
                              JOIN program ON circle.id = program.circleid
                              WHERE memberid = ? AND typeid=2');

      $stmt->execute(array($memberid, $memberid));

      return $stmt->fetchAll();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getMessagesCircles( $memberid ) {
    try {
      global $conn;
      if( $conn === null) return false;


      #add more types of circles...
      $stmt = $conn->prepare('SELECT partof.circleid AS id, chat.id AS chatid FROM chat JOIN partof ON chat.circleid = partof.circleid AND memberid = ?');

      $stmt->execute(array($memberid));

      return $stmt->fetchAll();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }


  function CreateIfNeeded( $member1 , $member2 ) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT chat.id FROM chat
                              JOIN circle ON circle.id = chat.circleid
                              JOIN partof ON partof.circleid = circle.id
                              WHERE memberid = ?
                              INTERSECT
                              SELECT chat.id FROM chat
                              JOIN circle ON circle.id = chat.circleid
                              JOIN partof ON partof.circleid = circle.id
                              WHERE memberid = ?');

      $stmt->execute(array($member1, $member2));
      $chat1 = $stmt->fetch();
      if($chat1){
        return $chat1;
      }

      $checkAdhoc = $conn->prepare('SELECT id FROM circletype WHERE name = ?');
      $checkAdhoc->execute(array('AdHoc'));
      $adhoc = $checkAdhoc->fetch();

      $circle_insertion = $conn->prepare('INSERT INTO circle (typeid) VALUES (?) RETURNING id');
      $circle_insertion->execute(array($adhoc['id']));
      $circle = $circle_insertion->fetch();

      $member1_insertion = $conn->prepare('INSERT INTO partof (memberid, circleid) VALUES (?, ?)');
      $member1_insertion->execute(array($member1,$circle['id']));

      $member2_insertion = $conn->prepare('INSERT INTO partof (memberid, circleid) VALUES (?, ?)');
      $member2_insertion->execute(array($member2,$circle['id']));

      $chat_insertion = $conn->prepare('INSERT INTO chat (circleid) VALUES (?) RETURNING id');
      $chat_insertion->execute(array($circle['id']));
      $chat = $chat_insertion->fetch();

      if($chat and $circle and $adhoc)
        return $chat;
      else {
        return null;
      }

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

?>
