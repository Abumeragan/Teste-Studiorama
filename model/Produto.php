<?php
	class Produto {

        private $idProduto;
        private $nome;
        private $descricao;
        private $preco;

        public function __construct(){
        }

        public function getIdProduto(){
            return $this->idProduto;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getPreco(){
            return $this->Preco;
        }

        public function setIdProduto($idProduto){
            $this->idProduto = $idProduto;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function setPreco($preco){
            $this->preco = $preco;
        }
    }