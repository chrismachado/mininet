<?php

  if(isset($_GET['name'])) {
    $reg = $_GET['reg'];
    $name = $_GET['name'];
    $weekday = (isset($_GET['weekday'])) ? $_GET['weekday'] : array();

    include_once('connection.php');

    $allowed = array(
      "sunday" => 0, "monday" => 0, "tuesday" => 0, "wednesday" => 0, "thursday" => 0, "friday" => 0, "saturday" => 0
    );

    foreach($weekday as $day)
      $allowed[$day] = 1;

    $sqlUpdateUser = "UPDATE usuario SET nome = :name WHERE id = :reg";
    $sqlUpdateAcess = "UPDATE horario SET dom = :dom, seg = :seg, ter = :ter, qua = :qua, qui = :qui, sex = :sex, sab = :sab WHERE id_usuario = :reg";

    try {
      $stmtUser = $con->prepare($sqlUpdateUser);
      $stmtAcess = $con->prepare($sqlUpdateAcess);

      $stmtUser->bindParam(':name', $name, PDO::PARAM_STR);
      $stmtUser->bindParam(':reg', $reg, PDO::PARAM_STR);

      $stmtAcess->bindParam(':reg', $reg, PDO::PARAM_STR);
      $stmtAcess->bindParam(':dom', $allowed['sunday'], PDO::PARAM_INT);
      $stmtAcess->bindParam(':seg', $allowed['monday'], PDO::PARAM_INT);
      $stmtAcess->bindParam(':ter', $allowed['tuesday'], PDO::PARAM_INT);
      $stmtAcess->bindParam(':qua', $allowed['wednesday'], PDO::PARAM_INT);
      $stmtAcess->bindParam(':qui', $allowed['thursday'], PDO::PARAM_INT);
      $stmtAcess->bindParam(':sex', $allowed['friday'], PDO::PARAM_INT);
      $stmtAcess->bindParam(':sab', $allowed['saturday'], PDO::PARAM_INT);

      $stmtUser->execute();
      $stmtAcess->execute();

      echo "<script> alert('User successfuly updated!!');
                  location = '../mininet-dashboard-management.php';</script>";

    } catch(PDOException $e) {
        echo "<script>alert('Erro');  window.setTimout(history.back(-2),3000);</script>";
        echo "Erro ".$e->getMessage();
    }
  } else {
    echo "<script>
            alert('Fill in all the fields!!');
            /*window.setTimout(history.back(-2),500);*/
          </script>";
  }

?>
