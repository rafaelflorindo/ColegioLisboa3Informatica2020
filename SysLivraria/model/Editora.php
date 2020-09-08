<?php
    class Editora{
        private $nome, $email, $dataCadastro, $telefone, $endereco, $contato;
        private $conn;

        public function __construct()
        {
            require_once("conexao.php");
            $this->nome="";
            $this->email="";
            $this->dataCadastro="";
            $this->telefone="";
            $this->endereco="";
            $this->contato="";
            $this->conn = $conectar;
        }

        private function setId($id){//este método é acessivel apenas pela própria classe
            $this->id= $id;
        }
        private function setNome($nome){//este método é acessivel apenas pela própria classe
            $this->nome= $nome;
        }
        private function setTelefone($telefone){//este método é acessivel apenas pela própria classe
            $this->telefone= $telefone;
        }
        private function setEmail($email){//este método é acessivel apenas pela própria classe
            $this->email= $email;
        }
        private function setEndereco($endereco){//este método é acessivel apenas pela própria classe
            $this->endereco= $endereco;
        }
        private function setContato($contato){//este método é acessivel apenas pela própria classe
            $this->contato= $contato;
        }

        private function getNome(){
            return $this->nome;
        }
        private function getEmail(){
            return $this->email;
        }
        private function getId(){
            return $this->id;
        }
        private function getTelefone(){
            return $this->telefone;
        }
        private function getEndereco(){
            return $this->endereco;
        }
        private function getContato(){
            return $this->contato;
        }

        public function adicionarEditora($nome, $email, $telefone, $endereco, $contato){
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setTelefone($telefone);
            $this->setEndereco($endereco);
            $this->setContato($contato);
            $this->dataCadastro = date("Y-m-d H:m:s");
            $sql = "INSERT INTO editora (nome, email, telefone, endereco, contato, dataCadastro) 
            values ('{$this->getNome()}','{$this->getEmail()}','{$this->getTelefone()}', '{$this->getEndereco()}','{$this->getContato()}','{$this->dataCadastro}')";

            $results = $this->conn->query($sql);
            if ($results > 0)
             return 1;
            else
             return 0;
        }
        public function alterarEditora($id, $nome, $email, $telefone, $endereco, $contato){
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setId($id);
            $this->setTelefone($telefone);
            $this->setEndereco($endereco);
            $this->setContato($contato);

            $sql = "UPDATE editora SET nome ='{$this->getNome()}', email='{$this->getEmail()}', telefone='{$this->getTelefone()}', endereco='{$this->getEndereco()}', contato='{$this->getContato()}' WHERE id = {$this->getId()}";
           
            $results = $this->conn->query($sql);
            
            if ($results > 0)
                return 1;
            else
                return 0;
        }

        public function excluirEditora($id){
            $this->setId($id);
            $sql = "DELETE FROM editora WHERE id='{$this->getId()}'";
            $results = $this->conn->query($sql);
            if ($results > 0)
                return 1;
            else
                return 0;
        }

        public function listarEditora(){
            $sql = "SELECT * FROM editora ORDER BY nome ASC";
            
            $retorno = $this->conn->query($sql);

            $lista = array();//array dinâmico para armazenar os registos da tabela
            
            while($linha = $retorno->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }

        public function resgatarEditora($id){
            $this->setId($id);

            $sql = "SELECT * FROM editora WHERE id = '{$this->getId()}'";
            
            $retorno = $this->conn->query($sql);
            
            while($linha = $retorno->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }
    }
?>