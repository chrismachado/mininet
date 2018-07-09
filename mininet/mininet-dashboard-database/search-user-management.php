<?php

  include_once('connection.php');
  $size = 0;
  if(empty($_POST['name']) && isset($_POST['name'])) {
    $sqlSearchByName1 = "SELECT * FROM usuario ORDER BY id ASC";
    try {
      $stmt = $con->query($sqlSearchByName1);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      $size = -1;
      echo "Erro : ".$e->getMessage();
    }
  } else {

    $name = (isset($_POST['name'])) ? "%".$_POST['name']."%" : "";

    $sqlSearchByName2 = "SELECT * FROM usuario WHERE nome like :name";

    try {
      $stmt = $con->prepare($sqlSearchByName2);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      $size = -1;
      echo "Erro : ".$e->getMessage();
    }
  }

  $size = count($rows);
  
?>
