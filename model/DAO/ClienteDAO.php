<?php
    class ClienteDAO {
        private $con;
        
        public function __construct(){
            require_once('Database.php');
            $this->con = Database::getInstancia();
        }
        public function create($cliente) {
            $sql = $this->con->prepare("INSERT INTO cliente(nome, email, telefone) VALUES (?, ?, ?)");
            $sql->bindParam(1, $cliente->getNome());
            $sql->bindParam(2, $cliente->getEmail());
            $sql->bindParam(3, $cliente->getTelefone());
            $sql->execute();            
        }
        public function update($cliente) {
            $sql = $this->con->prepare("UPDATE cliente SET nome = ?, email = ?, telefone = ?, WHERE idCliente = ?");
			$sql->bindParam(1, $cliente->getNome());
            $sql->bindParam(2, $cliente->getEmail());
            $sql->bindParam(3, $cliente->getTelefone());
            $sql->bindParam(4, $cliente->getIdCliente());
            $sql->execute();             
        }
        public function delete($cliente) {
            $sql = $this->con->prepare("DELETE FROM cliente WHERE idCliente = ?");
            $sql->bindParam(1, $cliente->getIdCliente());
            $sql->execute();
        }
        public function getCliente($id) {            
            $sql = $this->con->prepare("SELECT * FROM cliente WHERE idCliente = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $cliente = new Cliente();
            $cliente->setIdCliente((int)$row['idCliente']);
            $cliente->setNome($row['nome']);            
            $cliente->setEmail($row['email']); 
            $cliente->setTelefone($row['telefone']);            
            
            return $cliente;
        }
        
        public function getAll(){
            $clientes = array();
            $sql = "SELECT * FROM cliente";
            foreach ($this->con->query($sql) as $row) {
                $cliente = new Cliente();
                $cliente->setIdCliente((int)$row['idCliente']);
                $cliente->setNome($row['nome']);            
                $cliente->setEmail($row['email']); 
                $cliente->setTelefone($row['telefone']);   
                $clientes[] = $cliente;
            }
            return $clientes;
        }

        public function getAllPag($limit, $offset) {
            $clientes = array();
            $sql = $this->con->prepare("SELECT * FROM cliente ORDER BY idCliente DESC LIMIT :limit OFFSET :offset");
            $sql->bindValue(':limit', (INT)$limit, PDO::PARAM_INT);
            $sql->bindValue(':offset', (INT)$offset, PDO::PARAM_INT);            
            $sql->execute();
             
            foreach ($sql->fetchAll() as $row) {  
                $cliente = new Cliente();                
                $cliente->setIdCLiente((int)$row['idCliente']);
                $cliente->setNome($row['nome']);
                $cliente->setEmail($row['email']);
                $cliente->setTelefone($row['telefone']);

                $clientes[] = $cliente;
            }
            return $clientes;
        }
}