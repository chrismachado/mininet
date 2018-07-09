<?php

  if($_REQUEST['reg'] && $_REQUEST['name']) {
    $reg = $_GET['reg'];
    $name = $_GET['name'];

    include_once('connection.php');
    $sqlUser = "INSERT INTO usuario(id,nome) VALUES(:reg,:name)";
    $sqlAcess = "INSERT INTO horario(id_usuario, dom, seg, ter, qua, qui, sex, sab) VALUES (:reg, false,false,false,false,false,false,false)";


    try {
      $sqlValidate = "SELECT * FROM usuario WHERE nome = :name or id = :reg";
      $stmtValidate = $con->prepare($sqlValidate);
      $stmtValidate->bindParam(':name', $name, PDO::PARAM_STR);
      $stmtValidate->bindParam(':reg', $reg, PDO::PARAM_INT);
      $stmtValidate->execute();

      $rows = $stmtValidate->fetchAll(PDO::FETCH_ASSOC);

      $match = false;

      for ($row=0; $row < count($rows); $row++)
          if($rows[$row]['nome'] == $name || $rows[$row]['id'] == $reg) $match = true;


      if(!$match) {
        $stmtUser = $con->prepare($sqlUser);
        $stmtAcess = $con->prepare($sqlAcess);

        $stmtUser->execute(array(
          ':reg' => $reg,
          ':name' => $name
        ));
        $stmtAcess->execute(array(
          ':reg' => $reg
        ));

        echo "<script> alert('User successfuly registered!!');
                        location = '../mininet-dashboard-management.php';</script>";
      } else {
        echo "<script>alert('Already exist user with the same name or id!!'); window.setTimout(history.back(-2),500);;</script>";
      }

    } catch(PDOException $e) {
        echo "<script>alert('Erro'); window.setTimout(history.back(-2),3000);;</script>";
        echo "Erro ".$e->getMessage();
    }
  } else {
    echo "<script>
            alert('Preencha todos os campos!!');
            window.setTimout(history.back(-2),500);
          </script>";
  }

?>
