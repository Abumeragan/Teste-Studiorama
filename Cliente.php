<!DOCTYPE html>
<html lang="pt-br"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Controle de Estoque">
    <meta name="author" content="Rodrigo Dos Santos">
    <link rel="icon" href="https://code.jquery.com/jquery-3.2.1.min.js">

    <title>Controle de Estoque - Clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/jumbotron.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="./index">Controle de Estoque</a>

      <div class="navbar-collapse collapse" id="navbarsExampleDefault" aria-expanded="false" style="">
        <ul class="navbar-nav mr-auto">
            <a class="nav-link" href="./index">Produtos</a>          
          <li class="nav-item">
            <a class="nav-link" href="./Cliente">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Pedido">Pedidos</a>
          </li>
        </ul>
        </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h3 class="display-3">Clientes</h3>
        <a class="btn btn-primary btn-lg" href="./ClienteForm" role="button">+Cadastrar cliente</a>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="table" id="Tabela">
        <table class="table">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Nome do cliente</th>
			  <th>E-mail</th>
			  <th>Telefone</th>
			  <th>Ações</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
      <?php
      require_once('./model/Cliente.php');
      require_once('./model/DAO/ClienteDAO.php');
      $clienteDAO = new ClienteDAO();
      $clientes = array();
      $clientes = $clienteDAO->getAll();
      foreach ($clientes as $cliente) {
        echo '<tr>';
        echo '<th scope="row">'. $cliente->getIdCliente().'</th>';
        echo '<td>'. $cliente->getNome() .'</td>';
        echo '<td>'. $cliente->getEmail() .'</td>';
        echo '<td>'. $cliente->getTelefone() .'</td>';
        echo '<td><button type="button" class="btn btn-info" onclick="editar('. $cliente->getIdCliente().')">Editar</button> <button type="button" class="btn btn-danger" onclick="deletar('. $cliente->getIdCliente().')">Remover</button></td>';
        }
        ?>
		  </tbody>
		</table>
      </div>
        <script>
        function deletar(id){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET", "ClienteDel.php?id=" + id, true);
          xmlhttp.send();
        }

        function editar(id){
          window.location.replace("ClienteEdit.php?id=" + id);
        }
        </script>
      <hr>

      <footer>
        <p>© Rodrigo Dos Santos 2017</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->    
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

</body></html>