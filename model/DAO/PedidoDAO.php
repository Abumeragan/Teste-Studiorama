<?php
    class PedidoDAO {
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
        public function create($pedido) {
            $sql = $this->con->prepare("INSERT INTO pedido(idProduto, idCliente) VALUES (?, ?)");
            $sql->bindParam(1, $pedido->getIdProduto());
            $sql->bindParam(2, $pedido->getIdCliente());
            $sql->execute();            
        }
        
        public function delete($pedido) {
            $sql = $this->con->prepare("DELETE FROM pedido WHERE idCliente = ? AND idProduto = ?");
            $sql->bindParam(1, $pedido->getIdCliente());
            $sql->bindParam(2, $pedido->getIdProduto());
            $sql->execute();
        }

        public function getAll(){
            $pedidos = array();
            $sql = "SELECT * FROM pedido";
            foreach ($this->con->query($sql) as $row) {
                $pedido = new Pedido();
                $pedido->setIdProduto((int)$row['idProduto']);
                $pedido->setIdCliente((int)$row['idCliente']);            
                 
                $pedidos[] = $pedido;
            }
            return $pedidos;
        }
}