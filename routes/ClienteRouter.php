<?php
    global $app;
    
    $app->get('/cliente',  function () {			
        $clienteDAO = ClienteDAO();
        $clientes = array();
        $clientes = $clienteDAO->getAll();
        
        $json = array();
        foreach ($clientes as $cliente) {

            $json[] = array('id'=>$cliente->getIdCliente(),
            'nome'=>$cliente->getNome(),
            'email'=>$cliente->getEmail(),
            'telefone'=>$cliente->getTelefone());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
    });
    
    $app->get('/cliente/{id}',  function () {
        $id = $request->getAttribute('id');

        $clienteDAO = ClienteDAO();
        $cliente = $clienteDAO->getCliente($id);        

        $json = array('id'=>$cliente->getIdCliente(),
        'nome'=>$cliente->getNome(),
        'email'=>$cliente->getEmail(),
        'telefone'=>$cliente->getTelefone());        
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	});
        
    $app->post('/pedido', function($request, $response) {
        $cliente = new Cliente();
        $body = $request->getParsedBody();

        $cliente->setIdCliente((int)$body['idCliente']); 
        $cliente->setNome($body['nome']); 
        $cliente->setEmail($body['email']); 
        $cliente->setTelefone($body['telefone']); 

        $clienteDAO = ClienteDAO();
        $clienteDAO->create($cliente);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson);

    $app->put('/cliente/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');
        $body = $request->getParsedBody();
        
        $clienteDAO = ClienteDAO();
        $cliente = $clienteDAO->getCliente($id);
        
        $cliente->setNome($body['nome']);
        $cliente->setEmail($body['email']);
        $cliente->setTelefone($body['telefone']);
        
        $clienteDAO->update($cliente);
        
        $data = array('Authorized' => true);
        $newResponse = $response->withJson($data);
        	
        return $newResponse;
    })->add($validJson);
        
    $app->delete('/pedido/delete/`{id}', function($request, $response) {
        $id = $request->getAttribute('id');
        $clienteDAO = ClienteDAO();

        $clienteDAO->delete($id);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    });