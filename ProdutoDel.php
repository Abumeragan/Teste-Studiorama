<?php
    require_once('./model/Produto.php');
    require_once('./model/DAO/ProdutoDAO.php');

    $id = $_GET['id'];

    $produtoDAO = new ProdutoDAO();
    $produtoDAO->delete($id);