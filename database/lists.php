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

?>
