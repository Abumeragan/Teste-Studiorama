<?php
    class ProdutoDAO {
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
        public function create($produto) {
            $sql = $this->con->prepare("INSERT INTO produto(nome, descricao, preco) VALUES (?, ?, ?)");
            $sql->bindParam(1, $produto->getNome());
            $sql->bindParam(2, $produto->getDescricao());
            $sql->bindParam(3, $produto->getPreco());
            $sql->execute();            
        }
        public function update($produto) {
            $sql = $this->con->prepare("UPDATE produto SET nome = ?, descricao = ?, preco = ?, WHERE idProduto = ?");
			$sql->bindParam(1, $produto->getNome());
            $sql->bindParam(2, $produto->getDescricao());
            $sql->bindParam(3, $produto->getPreco());
            $sql->bindParam(4, $produto->getIdProduto());
            $sql->execute();             
        }
        public function delete($produto) {
            $sql = $this->con->prepare("DELETE FROM produto WHERE idProduto = ?");
            $sql->bindParam(1, $produto->getIdProduto());
            $sql->execute();
        }
        public function getProduto($id) {            
            $sql = $this->con->prepare("SELECT * FROM produto WHERE idProduto = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $produto = new Produto();
            $produto->setIdProduto((int)$row['idproduto']);
            $produto->setNome($row['nome']);            
            $produto->setDescricao($row['descricao']); 
            $produto->setPreco($row['preco']);            
            
            return $produto;
        }
        
        public function getAll(){
            $produtos = array();
            $sql = "SELECT * FROM produto";
            foreach ($this->con->query($sql) as $row) {
                $produto = new Produto();
                $produto->setIdProduto((int)$row['idproduto']);
                $produto->setNome($row['nome']);            
                $produto->setDescricao($row['descricao']); 
                $produto->setPreco($row['preco']);   
                $produtos[] = $produto;
            }
            return $produtos;
        }
}