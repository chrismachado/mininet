<?php
  if(isset($_GET['reg'])) {
    $reg = $_GET['reg'];
    include_once('connection.php');

    try {
      $sqlRemoveUser = "DELETE FROM usuario WHERE id = :reg";
      $sqlRemoveDevice = "DELETE FROM dispositivo WHERE id_usuario = :reg";
      $sqlRemoveAcess = "DELETE FROM horario WHERE id_usuario = :reg";

      $stmtUser = $con->prepare($sqlRemoveUser);
      $stmtDevice = $con->prepare($sqlRemoveDevice);
      $stmtAcess = $con->prepare($sqlRemoveAcess);

      $stmtUser->bindParam(':reg', $reg, PDO::PARAM_INT);
      $stmtDevice->bindParam(':reg', $reg, PDO::PARAM_INT);
      $stmtAcess->bindParam(':reg', $reg, PDO::PARAM_INT);

      $stmtAcess->execute();
      $stmtDevice->execute();
      $stmtUser->execute();

      echo "<script> alert('User successfuly removed!!');
                  location = '../mininet-dashboard-management.php';</script>";

    } catch(PDOException $e) {
        echo "<script>alert('Erro'); /* window.setTimout(history.back(-2),3000);*/</script>";
        echo "Erro ".$e->getMessage();
    }
  } else {
    echo "<script>
            alert('Erro!!');
            /*window.setTimout(history.back(-2),500);*/
          </script>";
  }

?>
