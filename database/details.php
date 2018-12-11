<?php
  function getCircleDetails( $circleid ) {
    try {
      global $conn;
      if( $conn === null) return false;


      #add more types of circles...
      $stmt = $conn->prepare('SELECT circletype.name AS circletype, department.name FROM circle JOIN
                              circletype ON circle.typeid = circletype.id
                              JOIN department ON circle.id = department.circleid
                              WHERE circleid = ?
                              UNION
                              SELECT circletype.name AS circletype, program.name FROM circle JOIN
                              circletype ON circle.typeid = circletype.id
                              JOIN program ON circle.id = program.circleid
                              WHERE circleid = ?');

      $stmt->execute(array($circleid, $circleid));

      return $stmt->fetch();
    } catch(PDOException $ex){
      $_SESSION['db_error'] = $ex;
    }
  }
  ?>
