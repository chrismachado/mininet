<?php
  try {
    $con = new PDO('mysql:host=localhost;dbname=mininet','root','12345');
  } catch(PDOException $e) {
    echo 'Erro : '.$e->getMessage();
  }
?>
