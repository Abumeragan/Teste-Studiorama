<?php
    require_once('./model/Cliente.php');
    require_once('./model/DAO/ClienteDAO.php');
    
    $id = $_GET['id'];
    
    $clienteDAO = new ClienteDAO();
    $clienteDAO->delete($id);