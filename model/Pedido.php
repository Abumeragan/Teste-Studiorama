<?php
	class Pedido {

        private $idProduto;
        private $idCliente;

        public function __construct(){
            require_once('./model/DAO/ProdutoDAO.php');
            require_once('./model/DAO/ClienteDAO.php');
            require_once('./model/Produto.php');
            require_once('./model/Cliente.php');
        }

        public function getIdProduto(){
            return $this->idProduto;
        }

        public function getIdCliente(){
            return $this->idCliente;
        }

        public function setIdProduto($idProduto){
            $this->idProduto = $idProduto;
        }

        public function setIdCLiente($idCliente){
            $this->idCliente = $idCliente;
        }

        public function getNomeCliente(){
            $clienteDAO = new ClienteDAO();
            $cliente = $clienteDAO->getCliente($this->idCliente);
            return $cliente->getNome();
        }

        public function getNomeProduto(){
            $produtoDAO = new ProdutoDAO();
            $produto = $produtoDAO->getProduto($this->idProduto);
            return $produto->getNome();
        }
    }