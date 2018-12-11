<?php
  function getMemberTypes() {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT * FROM membertype');
      $stmt->execute();

      return $stmt->fetchAll();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getPrograms() {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT * FROM program');
      $stmt->execute();

      return $stmt->fetchAll();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getDepartments() {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT * FROM department');
      $stmt->execute();

      return $stmt->fetchAll();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getPosts( $circleid ) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT * FROM post JOIN postedin ON post.id = postedin.postid WHERE postedin.circleid = ?  ORDER BY timest DESC');
      $stmt->execute(array($circleid));

      return $stmt->fetchAll();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getCircleMembers( $circleid ) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT member.id AS memberid, membertypeid FROM member JOIN partof ON member.id = partof.memberid WHERE partof.circleid = ?');

      $stmt->execute(array($circleid));

      return $stmt->fetchAll();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getCirclePosts( $circleid ) {
    try {
      global $conn;
      if( $conn === null) return false;
      $stmt = $conn->prepare('SELECT * FROM postedin WHERE circleid = ?');
      $stmt->execute(array($circleid));
      return $stmt->fetchAll();
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }


?>
