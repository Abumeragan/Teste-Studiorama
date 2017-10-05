<!DOCTYPE html>
<html lang="pt-br"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Controle de Estoque">
    <meta name="author" content="Rodrigo Dos Santos">
    <link rel="icon" href="https://v4-alpha.getbootstrap.com/favicon.ico">

    <title>Controle de Estoque - Pedido</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/jumbotron.css" rel="stylesheet">
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
        <h3 class="display-3">Pedido</h3>
        <a class="btn btn-primary btn-lg" href="./PedidoForm" role="button">+Cadastrar Pedido</a>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="table">
        <table class="table">
		  <thead>
			<tr>
			  <th>Cliente</th>
        <th>Produto</th>
        <th>Ação</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
      <?php
        require_once('./model/Pedido.php');
        require_once('./model/DAO/PedidoDAO.php');
        $pedidoDAO = new PedidoDAO();
        $pedidos = array();
        $pedidos = $pedidoDAO->getAll();
        foreach ($pedidos as $pedido) {
          echo '<tr>';
          echo '<th scope="row">'. $pedido->getNomeCliente().'</th>';
          echo '<td>'. $pedido->getNomeProduto() .'</td>';
          
          echo '<td> <button type="button" class="btn btn-danger"onclick="deletar('. $pedido->getIdCliente().','.$pedido->getidProduto().')">Remover</button></td>';
          }
        ?> 
			</tr>
		  </tbody>
		</table>
      </div>

      <script>
        function deletar(idCliente, idProduto){
          
          
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET", "PedidoDel.php?idCliente=" + idCliente+ " & " +"idProduto="+idProduto, true);
          xmlhttp.send();

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    
</body></html>