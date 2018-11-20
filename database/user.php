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
      $stmt->execute(array($name, $email, $hash));
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

      return $mail !== false && password_verify($password, $mail['password']);
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }

?>
