<!DOCTYPE html>
<html lang="pt-br"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Controle de Estoque">
    <meta name="author" content="Rodrigo Dos Santos">
    <link rel="icon" href="https://v4-alpha.getbootstrap.com/favicon.ico">

    <title>Controle de Estoque - Editar Cliente</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

  <?php
        require_once('./model/Cliente.php');
        require_once('./model/DAO/ClienteDAO.php');
        $id = $_GET['id'];
        
        $clienteDAO = new ClienteDAO();
        $cliente = $clienteDAO->getCliente($id);

        $id = $cliente->getIdCliente();
        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $telefone = $cliente->getTelefone();
        
    ?>  

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
        <h3 class="display-3">Editar cliente</h3>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="form">
        <table class="table">
		  <form method="post">
			  <div class="form-group">
				<label for="idCliente">ID Cliente</label>
				<input type="number" class="form-control" id="idCliente" placeholder="ID"  name="idCliente"  value="<?php echo htmlspecialchars($id); ?>" disabled>
			  </div>
			  
			  <div class="form-group">
				<label for="nomeCliente">Nome do cliente</label>
				<input type="text" class="form-control" id="nomeCliente" placeholder="Nome do Cliente" name="nomeCliente" maxlength="45" value="<?php echo htmlspecialchars($nome); ?>" >
			  </div>
			  
			  
			  <div class="form-group">
				<label for="emailCliente">E-mail</label>
				<input type="email" class="form-control" id="email" placeholder="E-mail" name="email" maxlength="60" value="<?php echo htmlspecialchars($email); ?>" >
			  </div>
			  
			  
			  <div class="form-group">
				<label for="telefoneCliente">Telefone</label>
				<input type="teç" class="form-control" id="telefoneCliente" placeholder="Telefone" name="telefone" maxlength="15" value="<?php echo htmlspecialchars($telefone); ?>" >
        </div>

        <input type="submit" class="btn btn-primary" value="Atualizar" name="atualizar">

        <?php
            $Cliente->setIdCliente($id);
            $Cliente->setNome($_POST['nomeCliente']);
            $Cliente->setEmail($_POST['email']);
            $Cliente->setTelefone($_POST['telefone']);

            if(isset($_POST["atualizar"])){
                $clienteDAO->update($Cliente);
            }
            
    ?>
    
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