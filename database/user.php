<?php
  function createUser($name, $email, $password) {
    try {
      global $conn;
      if( $conn === null) return false;
      $options = [
          'cost' => 12,
      ];

      $hash = password_hash ($password , PASSWORD_DEFAULT, $options);

      $stmt = $conn->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
      return $stmt->execute(array($name, $email, $hash));
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getUser($id) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT * FROM users WHERE id = ?');
      $stmt->execute(array($id));

      return $stmt->fetch();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getEntity($userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT entity.name AS name FROM entity JOIN users ON users.entityid = entity.id WHERE users.id = ?');
      $stmt->execute(array($userid));

      return $stmt->fetch();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function getProgram($userid) {
    try {
      global $conn;
      if( $conn === null) return false;

      $stmt = $conn->prepare('SELECT program.name AS name , program.logo AS logo , department.name AS department FROM program JOIN users ON users.programid = program.id JOIN department ON program.depid = department.id WHERE users.id = ?');
      $stmt->execute(array($userid));

      return $stmt->fetch();

    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

  function isValidUser($email, $password) {
    try {
      global $conn;
      if( $conn === null) return false;
      $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
      $stmt->execute(array($email));

      $mail = $stmt->fetch();

      $_SESSION['name'] = $mail['name'];
      $_SESSION['id'] = $mail['id'];
      $_SESSION['profilepic'] = $mail['profilepic'];
      return $mail !== false && password_verify($password, $mail['password']);
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

?>
