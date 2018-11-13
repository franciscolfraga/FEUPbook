<?php
  function createUser($name, $email, $password) {
    global $conn;

    $options = [
        'cost' => 12,
    ];

    $hash = password_hash ($password , PASSWORD_DEFAULT, $options);

    $stmt = $conn->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
    $stmt->execute(array($name, $email, $hash));
  }

  function isValidUser($email, $password) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute(array($email));

    $mail = $stmt->fetch();

    return $mail !== false && password_verify($password, $mail['password']);
  }

?>
