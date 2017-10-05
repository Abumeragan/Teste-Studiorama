<!DOCTYPE html>
<html lang="pt-br"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Controle de Estoque">
    <meta name="author" content="Rodrigo Dos Santos">
    <link rel="icon" href="https://v4-alpha.getbootstrap.com/favicon.ico">

    <title>Controle de Estoque - Novo Pedido</title>

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
        <h3 class="display-3">Novo produto</h3>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="form">
        <table class="table">
		  <form method="post">

      <div class="form-group">
      <label for="idProduto">ID Produto</label>
      <input type="number" class="form-control" id="idProduto" placeholder="ID Produto" name="idProduto">
      </div>
			  
      <div class="form-group">
      <label for="idCliente">ID Cliente</label>
      <input type="number" class="form-control" id="idCliente" placeholder="ID Cliente" name="idCliente" >
      </div>

      <?php
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if(isset($_POST['idProduto'])){
            require_once('./model/Pedido.php');
            require_once('./model/DAO/PedidoDAO.php');
            $pedido = new Pedido();
            $pedido->setIdProduto($_POST['idProduto']);
            $pedido->setIdCliente($_POST['idCliente']);
            
            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->create($pedido);
          }
      }
	  ?>
			  			  
			  <input type="submit" class="btn btn-primary" value="Cadastrar">
		</form>
		
      </div>

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