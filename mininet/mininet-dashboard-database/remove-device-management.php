<?php
  try {
    include_once('connection.php');
    $id = $_GET['id'];
    $data = $_GET['data'];


    $sqlUpdate = "UPDATE dispositivo SET id_usuario=1 WHERE mac=:mac";

    $stmtUpdate = $con->prepare($sqlUpdate);

    $stmtUpdate->execute(array(
        ':mac' => $data
    ));

    echo $stmtUpdate->rowCount()." records UPDATED successfully";

    echo "<script>
                      location = '../mininet-dashboard-management.php';</script>";
  } catch(PDOException $e) {
    echo $e->getMessage();
  }



?>
