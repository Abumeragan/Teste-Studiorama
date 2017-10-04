<?php
    global $app;
    
    $app->get('/produto',  function ($request, $response) {			
        $produtoDAO = new ProdutoDAO();
        $produtos = array();
        $produtos = $produtoDAO->getAll();
        
        $json = array();
        foreach ($produtos as $produto) {

            $json[] = array('id'=>$produto->getIdProduto(),
            'nome'=>$produto->getNome(),
            'descricao'=>$produto->getDescricao(),
            'preco'=>$produto->getPreco());
        }
        
        $newResponse = $response->withJson($json);
        return $newResponse;
    });
    
    $app->get('/produto/{id}',  function ($request, $response) {
        $id = $request->getAttribute('id');

        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getProduto($id);        

        $json = array('id'=>$produto->getIdProduto(),
        'nome'=>$produto->getNome(),
        'descricao'=>$produto->getDescricao(),
        'preco'=>$produto->getPreco());        
        
        $newResponse = $response->withJson($json);
        return $newResponse;
	});
        
    $app->post('/produto', function($request, $response) {
        $produto = new Produto();
        $body = $request->getParsedBody();

        $produto->setIdProduto((int)$body['idCliente']); 
        $produto->setNome($body['nome']); 
        $produto->setDescricao($body['descricao']); 
        $produto->setPreco($body['preco']); 

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->create($produto);

        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    })->add($validJson);

    $app->put('/produto/update/{id}',function($request, $response) {
        $id = $request->getAttribute('id');
        $body = $request->getParsedBody();
        
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getProduto($id);
        
        $produto->setNome($body['nome']); 
        $produto->setDescricao($body['descricao']); 
        $produto->setPreco($body['preco']);
        
        $produtoDAO->update($produto);
        
        $data = array('Authorized' => true);
        $newResponse = $response->withJson($data);
        	
        return $newResponse;
    })->add($validJson);
        
    $app->delete('/produto/delete/{id}', function($request, $response) {
        $id = $request->getAttribute('id');
        $produtoDAO = new ProdutoDAO();

        $produtoDAO->delete($id);
        
        $data = array('valido' => true);
        $newResponse = $response->withJson($data);
    });

    $app->get('/produto/{limit}/{offset}',  function ($request, $response) {	
		$limit = $request->getAttribute('limit');
        $offset = $request->getAttribute('offset');

        $produtoDAO = new ProdutoDAO();
        $produtos = array();
        $produtos = $produtoDAO->getAllPag($limit, $offset);
        
        $json = array();
        foreach ($produtos as $produto) {
            
            $json[] = array('id'=>$produto->getIdProduto(),
            'nome'=>$produto->getNome(),
            'descricao'=>$produto->getDescricao(),
            'preco'=>$produto->getPreco());
        }
        
        return json_encode($json);
	});