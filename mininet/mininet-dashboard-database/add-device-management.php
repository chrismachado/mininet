<?php
  try {
    include_once('connection.php');
    $id = $_GET['id'];
    $data = $_GET['mac'];

    $sqlUpdate = "UPDATE dispositivo SET id_usuario=:id WHERE mac=:mac";


    $stmtUpdate = $con->prepare($sqlUpdate);

    $stmtUpdate->execute(array(
        ':id' => $id,
        ':mac' => $data
    ));
    echo $stmtUpdate->rowCount()." records UPDATED successfully";
    echo "<script>
                    location = '../mininet-dashboard-management.php';</script>";
  } catch(PDOException $e) {
    echo $e->getMessage();
  }



?>
