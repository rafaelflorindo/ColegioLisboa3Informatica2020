<?php
    class Autor{
        private $nome, $email, $dataCadastro;
        private $conn;

        public function __construct()
        {
            require_once("conexao.php");
            $this->nome="";
            $this->email="";
            $this->dataCadastro="";
            $this->conn = $conectar;
        }

        private function setId($id){//este método é acessivel apenas pela própria classe
            $this->id= $id;
        }
        private function setNome($nome){//este método é acessivel apenas pela própria classe
            $this->nome= $nome;
        }
        private function setEmail($email){//este método é acessivel apenas pela própria classe
            $this->email= $email;
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

        public function adicionarAutor($nome, $email){
            $this->setNome($nome);
            $this->setEmail($email);
            
            $this->dataCadastro = date("Y-m-d");

            $sql = "INSERT INTO autor (nome, email, dataCadastro) 
            values ('{$this->getNome()}','{$this->getEmail()}','{$this->dataCadastro}')";

            $this->conn->query($sql);
            
        }
        public function alterarAutor($id, $nome, $email){
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setId($id);

            $sql = "UPDATE autor SET nome ='{$this->getNome()}', email='{$this->getEmail()}' 
            WHERE id = {$this->getId()}";
           
            $this->conn->query($sql);
        }

        public function excluirAutor($id){
            $this->setId($id);

            $sql = "DELETE FROM autor WHERE id='{$this->getId()}'";
            $this->conn->query($sql);
        }

        public function listarAutor(){
            $sql = "SELECT * FROM autor ORDER BY nome ASC";
            
            $retorno = $this->conn->query($sql);

            $lista = array();//array dinâmico para armazenar os registos da tabela
            
            while($linha = $retorno->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }
        public function resgatarAutor($id){
            $this->setId($id);

            $sql = "SELECT * FROM autor WHERE id = '{$this->getId()}'";
            
            $retorno = $this->conn->query($sql);

            //$lista = array();//array dinâmico para armazenar os registos da tabela
            
            while($linha = $retorno->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }
    }
?>