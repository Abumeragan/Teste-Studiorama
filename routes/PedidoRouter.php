<?php
    global $app;
    
    $app->get('/pedido',  function ($request, $response) {			
        $pedidoDAO = new PedidoDAO();
        $pedidos = array();
        $pedidos = $pedidoDAO->getAll();
        
        $json = array();
        foreach ($pedidos as $pedido) {

            $clienteDAO = new ClienteDAO();
            $cliente = $clienteDAO->getCliente($pedido->getIdProduto());

            $produtoDAO = new ProdutoDAO();
            $produto = $produtoDAO->getProduto($pedido->getIdCliente());

            $json[] = array('cliente'=>$cliente->getNome(),
            'produto'=>$produto->getNome());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	});
        
    $app->post('/pedido', function($request, $response) {
        $pedido = new Pedido();
        $body = $request->getParsedBody();
      
        $pedido->setIdProduto((int)$body['idProduto']);
        $pedido->setIdCliente((int)$body['idCliente']); 

        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->create($pedido);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson);
        
    $app->delete('/pedido/delete', function($request, $response) {
        $pedidoDAO = new PedidoDAO();
        $body = $request->getParsedBody();

        $clienteDAO = new ClienteDAO();
        $cliente = $clienteDAO->getCliente((int)$body['idCliente']);

        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getProduto((int)$body['idProduto']);

        $pedido = new Pedido();
        $pedido->setIdProduto($produto->getIdProduto);
        $pedido->setIdCLiente($cliente->getIdCliente);

        $produtoDAO->delete($pedido);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson);

    $app->get('/pedido/{limit}/{offset}',  function ($request, $response) {	
		$limit = $request->getAttribute('limit');
        $offset = $request->getAttribute('offset');

        $pedidoDAO = new PedidoDAO();
        $pedidos = array();
        $pedidos = $pedidoDAO->getAllPag($limit, $offset);
        
        $json = array();
        foreach ($pedidos as $pedido) {

            $clienteDAO = new ClienteDAO();
            $cliente = $clienteDAO->getCliente($pedido->getIdProduto());

            $produtoDAO = new ProdutoDAO();
            $produto = $produtoDAO->getProduto($pedido->getIdCliente());

            $json[] = array('cliente'=>$cliente->getNome(),
            'produto'=>$produto->getNome());
        }
        
        return json_encode($json);
	});