<?php
  try {
    include_once('connection.php');
    $sql = "SELECT usuario.id,usuario.nome,dispositivo.mac FROM (usuario INNER JOIN dispositivo ON usuario.id = dispositivo.id_usuario) ORDER BY id ASC";
    $result = $con->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    if(count($rows) > 0) {
      for($row = 0; $row < count($rows); $row++) {
        echo "<tr>  <td>" ;
                  echo $rows[$row]['id'];
        echo "  </td>";

        echo "  <td>" ;
                  echo $rows[$row]['nome'];
      echo "    </td>";
        echo "  <td>" ;
                  echo $rows[$row]['mac'];
        echo "  </td> </tr>";
      }
    } else {
      echo "<h2>No registered users!!</h2>";
    }
  } catch(PDOException $e) {
      echo "<script>alert('Erro'); window.setTimout(history.back(-2),3000);;</script>";
      echo "Erro ".$e->getMessage();
  }

?>
