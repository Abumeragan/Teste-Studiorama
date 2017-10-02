<?php
	class Pedido {

        private $idProduto;
        private $idCliente;

        public function __construct(){
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
    }