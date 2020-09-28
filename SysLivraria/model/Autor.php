<?php
    class Autor{
        private $id, $nome, $email, $dataCadastro;
        private $conn;

        public function __construct()
        {
            require_once("conexao.php");
            $this->nome="";
            $this->email="";
            $this->dataCadastro="";
            $this->conn = $conectar;
        }

        private function setId($id):bool{//este método é acessivel apenas pela própria classe
            //$id = (int)$id;
            if(is_int($id)){
                $this->id= $id;
                return true;
            }else
                return false;
        }
        private function setNome($nome):bool{//este método é acessivel apenas pela própria classe
            if(is_string($nome)){
                $this->nome= $nome;
                return true;
            }else
                return false;
        }
        private function setEmail($email):bool{//este método é acessivel apenas pela própria classe
            if(is_string($email)){
                $this->email= $email;
                return true;
            }else
                return false;
        }
        private function getNome():String{
            return $this->nome;
        }
        private function getEmail():String{
            return $this->email;
        }
        private function getId():int{
            return $this->id;
        }
        public function adicionarAutor($nome, $email):int
        {
            $this->setNome($nome);
            $this->setEmail($email);
            $this->dataCadastro = date("Y-m-d");

            $stmt = $this->conn->prepare("INSERT INTO autor (nome, email, dataCadastro) 
            values (?,?,?)");
            $stmt->bind_param("sss", $this->nome, $this->email, $this->dataCadastro);
            $results = $stmt->execute();
            if ($results > 0)
             return 1;
            else
             return 0;
        }
        public function alterarAutor($id, $nome, $email):int
        {

            $this->setNome($nome);
            $this->setEmail($email);
            $this->setId($id);

            $stmt = $this->conn->prepare("UPDATE autor SET nome=?, email=?, dataCadastro=? WHERE id=?");
            $stmt->bind_param("sssd", $this->nome, $this->email, $this->dataCadastro, $this->id);
            $results = $stmt->execute();
            
            if ($results > 0)
                return 1;
            else
                return 0;
        }
        
        public function excluirAutor($id):int
        {
            $this->setId($id);
            $stmt = $this->conn->prepare("DELETE FROM autor WHERE id=?");
            $stmt->bind_param("d",$this->id);
            $results = $stmt->execute();
            
            if ($results > 0)
                return 1;
            else
                return 0;
        }

        public function listarAutor():array
        {
            
            $stmt = $this->conn->prepare("SELECT * FROM autor ORDER BY nome ASC");
            $stmt->execute();

            $result = $stmt->get_result();
            $lista = array();
            while($linha = $result->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }

        public function resgatarAutor($id):array
        {
            $this->setId($id);
            $stmt = $this->conn->prepare("SELECT * FROM autor WHERE id = ?");
            $stmt->bind_param("d", $this->id);
            $stmt->execute();

            $result = $stmt->get_result();
            $lista = array();
            while($linha = $result->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }
    }
?>
