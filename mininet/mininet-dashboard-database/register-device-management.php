<?php

  if($_REQUEST['reg'] && $_REQUEST['mac']) {
    $reg = $_GET['reg'];
    $address = $_GET['mac'];

    include_once('connection.php');
    $sqlDevice = "INSERT INTO dispositivo(id_usuario, mac) VALUES(:reg,:address)";

    try {
      $sqlValidate = "SELECT * FROM usuario WHERE id = :reg";
      $stmtValidate = $con->prepare($sqlValidate);
      $stmtValidate->bindParam(':reg', $reg, PDO::PARAM_INT);
      $stmtValidate->execute();

      $rows = $stmtValidate->fetchAll(PDO::FETCH_ASSOC);

      $match = false;

      for ($row=0; $row < count($rows); $row++)
          if($rows[$row]['id'] == $reg) $match = true;

      if($match) {
        $stmtDevice = $con->prepare($sqlDevice);

        $stmtDevice->execute(array(
          ':reg' => $reg,
          ':address' => $address
        ));

        echo "<script> alert('Device successfuly registered!!');
                        location = '../mininet-dashboard-management.php';</script>";
      } else {
        echo "<script>alert('There isn't user with this id!!'); window.setTimout(history.back(-2),500);;</script>";
      }

    } catch(PDOException $e) {
        echo "<script>alert('Erro'); window.setTimout(history.back(-2),3000);;</script>";
        echo "Erro ".$e->getMessage();
    }
  } else {
    echo "<script>
            alert('Fill in all the fields!!');
            window.setTimout(history.back(-2),500);
          </script>";
  }

?>
