<?php
    require_once('./model/Pedido.php');
    require_once('./model/DAO/PedidoDAO.php');

    $idCliente = $_GET['idCliente'];
    $idProduto = $_GET['idProduto'];

    var_dump($idCliente);
    var_dump($idProduto);

    $pedidoDAO = new PedidoDAO();
    $pedidoDAO->delete($idCliente, $idProduto);