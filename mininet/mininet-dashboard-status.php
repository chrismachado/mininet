<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/3.3/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Painel de Controle Mininet</title>
    <!-- Bootstrap core CSS -->
    <link href="./mininet-dashboard-bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./mininet-dashboard-bootstrap/dashboard.css" rel="stylesheet">

    <script src="./mininet-dashboard-database/connection.php"></script>
    <script src="./mininet-dashboard-bootstrap/menu-management.js"></script>


  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" >Mininet</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Status<span class="sr-only">(current)</span></a></li>
            <li class=""><a href="mininet-dashboard-management.php">Gerenciamento</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Painel de Controle</h1>

          <h2 class="sub-header">Usuários</h2>
          <!-- Tabela de usuários permitidos -->
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th> <th>Nome</th> <th>Dispositivos</th>
                </tr>
              </thead>
              <tbody>
                <?php include_once("./mininet-dashboard-database/search-allowed-status.php"); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./mininet-dashboard-bootstrap/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./mininet-dashboard-bootstrap/bootstrap.min.js"></script>
    <script src="./mininet-dashboard-bootstrap/menu-management.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./mininet-dashboard-bootstrap/holder.min.js"></script>

</body></html>
