<?php
  function nameEdit($name, $userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE users SET name = ? WHERE id = ?');
      return $stmt->execute(array($name, $userid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function emailEdit($email, $userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE users SET email = ? WHERE id = ?');
      return $stmt->execute(array($email, $userid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function passwordEdit($password, $userid) {
    try {
      global $conn;
      if( $conn === null) return false;
      $options = [
          'cost' => 12,
      ];
      $hash = password_hash ($password , PASSWORD_DEFAULT, $options);
      $stmt = $conn->prepare('UPDATE users SET password = ? WHERE id = ?');
      return $stmt->execute(array($hash, $userid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function entityEdit($entityid, $userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE users SET entityid = ? WHERE id = ?');
      return $stmt->execute(array($entityid, $userid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function programEdit($programid, $userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE users SET programid = ? WHERE id = ?');
      return $stmt->execute(array($programid, $userid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function departmentEdit($depid, $userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE users SET depid = ? WHERE id = ?');
      return $stmt->execute(array($depid, $userid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function profilepicEdit($path, $userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('UPDATE users SET profilepic = ? WHERE id = ?');
      return $stmt->execute(array($path, $userid));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }
  ?>
