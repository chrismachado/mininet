<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/3.3/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="#">

  <title>Painel de Controler Mininet</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Bootstrap core CSS -->
  <link href="./mininet-dashboard-bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./mininet-dashboard-bootstrap/dashboard.css" rel="stylesheet">

  <script src="./mininet-dashboard-bootstrap/menu-management.js"></script>

</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Mininet</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li ><a href="mininet-dashboard-status.php">Status</a></li>
          <li class="active"><a href="mininet-dashboard-management.php">Gerenciamento<span class="sr-only">(current)</span></a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Painel de Controle</h1>

        <h2 class="sub-header">Controle de Acesso</h2>

        <div class="container-fluid">
          <h2 class="sub-header">Novo Usuário</h2>
          <form name='new-user-form' class="form-inline" action="./mininet-dashboard-database/register-user-management.php" method="get">
            <div class="form-group">
              ID: <input type="text" class="form-control" id="reg" placeholder="Digite um ID"  name="reg">
            </div>
            <div class="form-group">
              Nome: <input type="text" class="form-control" id="name" placeholder="Digite um nome"  name="name">
            </div>
            <button type="submit" class="btn btn-primary">Usuário <span class='glyphicon glyphicon-plus'></span></button>
          </form>
        </div>

        <div class="container-fluid">
          <h2 class="sub-header">Procurar Usuário</h2>
          <form name='search-user-form' class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="form-group">
              Nome: <input type="text" class="form-control" id="name" placeholder="Digite um nome"  name="name">
            </div>
            <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-search'></span></button>
          </form>

          <?php
          include("./mininet-dashboard-database/search-user-management.php");
          if($size > 0) {

            $strGenTable1 = "<div class='table-responsive'> <table class='table table-striped'> <thead> <tr> <th>#</th> <th>Nome</th> </tr> </thead> <tbody>";
            $strGenTable2 = "</tbody> </table> </div>";

            echo "<h3 class='sub-header'>Resultados</h3>";
            echo $strGenTable1;
            for($row = 0; $row < $size; $row++ ) {
              echo "<tr>  <td>" ;
              echo $rows[$row]['id'];
              echo "  </td>";
              echo "  <td>" ;
              echo $rows[$row]['nome'];
              if ($rows[$row]['nome'] != 'Usuário Padrao' && $rows[$row]['nome'] != 'Usuário Padrão' ) {
                echo "    </td> <td>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#edit-modal'  data-nome='".$rows[$row]['nome']."' data-reg='".$rows[$row]['id']."' ><span class='glyphicon glyphicon-pencil'></span></button>

                <button type='button' class='btn btn-success' data-toggle='modal' data-target='#adding-modal'  data-whatever='".$rows[$row]['nome']."' data-id='".$rows[$row]['id']."' id='btn-device'><span class='glyphicon glyphicon-plus'></span></button>

                <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#remove-modal' data-whatever='".$rows[$row]['nome']."' data-id='".$rows[$row]['id']."'><span class='glyphicon glyphicon-trash'></span></button>

                </td> </tr>";
              } else {
                echo "    </td> <td></td> </tr>";
              }
            }
            echo $strGenTable2;
          }
          ?>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit-modalLabel">Modificando Usuário :
          </button>
        </div>
        <div class="modal-body">
          <form name='modify-form-name' id="modify-form" action="./mininet-dashboard-database/update-user-management.php" method="get">
            <div class="form-group">
              <label for="reg" class="form-control-label">ID:</label>
              <input type="text" class="form-control" name="reg" id="reg" readonly>
            </div>

            <div class="form-group">
              <label for="name" class="form-control-label">Nome:</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-check">
              <div class="custom-control custom-checkbok">
                Domingo: <input class="form-check-input" type="checkbox" name="weekday[]" value="sunday" id="weekday">

                Segunda-feira: <input class="form-check-input" type="checkbox" name="weekday[]" value="monday" id="weekday-mon">

                Terça-feira: <input class="form-check-input" type="checkbox" name="weekday[]" value="tuesday" id="weekday">

                Quarta-feira: <input class="form-check-input" type="checkbox" name="weekday[]" value="wednesday" id="weekday">

                Quinta-feira: <input class="form-check-input" type="checkbox" name="weekday[]" value="thursday" id="weekday">
                <br>
                Sexta-feira: <input class="form-check-input" type="checkbox" name="weekday[]" value="friday" id="weekday">

                Sábado: <input class="form-check-input" type="checkbox" name="weekday[]" value="saturday" id="weekday">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" id="bt-mod-form" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="adding-modal" tabindex="-1" role="dialog" aria-labelledby="adding-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adding-modalLabel">Adicionando novo dispositivo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <form name='adding-form-name' id="adding-form" action="" method="post">
            <div class="row">
              <div class="col-sm-5 col-md-12">
                <div class="form-group">
                  <label for="name" class="form-control-label">ID:</label>
                  <input type="text" class="form-control" name="reg" id="reg" readonly>
                </div>

                <div class="form-group">
                  <label for="name" class="form-control-label">Usuário:</label>
                  <input type="text" class="form-control" name="name" id="name" readonly>
                </div>
                <hr>
              </div>

              <div class="row">
                <div class="form-group">

                  <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="text-center" colspan="2">Dispositivos do usuário</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">

                            <?php
                            echo "<form><button type='submit' style='visibility:hidden'></button></form>";
                            if(isset($_POST['reg'])) {
                              include_once("./mininet-dashboard-database/connection.php");

                              $id = $_POST['reg'];
                              $sqlUserD = "SELECT mac FROM dispositivo WHERE id_usuario = :id";

                              try {
                                $stmtUserD = $con->prepare($sqlUserD);
                                $stmtUserD->execute(array(
                                  ':id' => $id));
                                  $rows = $stmtUserD->fetchAll(PDO::FETCH_ASSOC);


                                  for ($row=0; $row < count($rows) ; $row++) {
                                    echo "
                                    <form name='remove-device-form' action='./mininet-dashboard-database/remove-device-management.php' method='get'>
                                    <div style='position:absolute'><input style='visibility:hidden' size='0px' value= '".$id."' name ='id'></div>
                                    <tr>
                                    <td><input  name='data' class='form-control text-center' type='text' value='".$rows[$row]['mac']."' readonly></td>
                                    <td><button type='submit' class='btn btn-danger btn-sm' value='".$rows[$row]['mac']."'>  <span class='glyphicon glyphicon-remove'></span></button></td>

                                    </tr></form>
                                    ";
                                  }

                                } catch (PDOException $e) {
                                  echo $e->getMessage();
                                }
                              } else {
                                echo '<tr><td><center><button type="submit" class="btn btn-primary" id="form-add-sub">Find  <span class="glyphicon glyphicon-search"></span></button></center>
                                <td></tr>';
                              }

                              ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="text-center" colspan="2">Dispositivos Disponíveis</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                              echo "<br>";
                              if(isset($_POST['reg'])) {
                                include_once("./mininet-dashboard-database/connection.php");
                                $sqlUserD = "SELECT mac FROM dispositivo WHERE id_usuario = 1";

                                try {
                                  $stmtUserD = $con->prepare($sqlUserD);
                                  $stmtUserD->execute();
                                  $rows = $stmtUserD->fetchAll(PDO::FETCH_ASSOC);
                                  if(count($rows) == 0) echo "<tr class='text-center'><td>No devices available!</td></tr>";

                                  for ($row=0; $row < count($rows) ; $row++) {
                                    echo "
                                    <tr>
                                    <form action='./mininet-dashboard-database/add-device-management.php' method='get'>
                                    <div style='position:absolute'><input style='visibility:hidden' size='0px' value= '".$id."' name ='id'></div>
                                    <td><input name='mac' class='form-control text-center' type='text' value='".$rows[$row]['mac']."' readonly></td>
                                    <td> <button type='submit' value='".$rows[$row]['mac']."' class='btn btn-primary btn-sm' >  <span class='glyphicon glyphicon-plus'></span></button></td></form></tr>

                                    ";
                                  }
                                } catch (PDOException $e) {
                                  echo $e->getMessage();
                                }
                              } else {
                                echo '<tr><td><center><button type="submit" class="btn btn-primary" id="form-add-sub">Find  <span class="glyphicon glyphicon-search"></span></button></center>
                                <td></tr>';
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="remove-modal" tabindex="-1" role="dialog" aria-labelledby="remove-modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="remove-modalLabel">Removendo Usuário: </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"></span>
            </button>
          </div>
          <div class="modal-body">
            <form id="remove-form" action="./mininet-dashboard-database/remove-user-management.php" method="get">
              <div class="form-group">
                <label for="name" class="form-control-label">ID:</label>
                <input type="text" class="form-control" name="reg" id="reg" readonly>
              </div>
              <div class="form-group">
                <label for="name" class="form-control-label">Usuário:</label>
                <input type="text" class="form-control" name="name" id="name" readonly>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" id="bt-rm-form" class="btn btn-primary">Remover</button>
          </div>
        </div>
      </div>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./mininet-dashboard-bootstrap/jquery.min.js"></script>
    <script src="./mininet-dashboard-bootstrap/buttons-actions.js"></script>
    <script src="./mininet-dashboard-bootstrap/modal-edit-user.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./mininet-dashboard-bootstrap/bootstrap.min.js"></script>
    <script src="./mininet-dashboard-bootstrap/menu-management.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./mininet-dashboard-bootstrap/holder.min.js"></script>

  </body></html>
