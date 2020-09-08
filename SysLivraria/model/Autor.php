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

        private function setId($id):bool{//este método é acessivel apenas pela própria classe
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

        public function adicionarAutor($nome, $email):int{
            $this->setNome($nome);
            $this->setEmail($email);
            
            $this->dataCadastro = date("Y-m-d");

            $sql = "INSERT INTO autor (nome, email, dataCadastro) 
            values ('{$this->getNome()}','{$this->getEmail()}','{$this->dataCadastro}')";

            $results = $this->conn->query($sql);
            if ($results > 0)
             return 1;
            else
             return 0;
        }
        public function alterarAutor($id, $nome, $email):int{
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setId($id);

            $sql = "UPDATE autor SET nome ='{$this->getNome()}', email='{$this->getEmail()}' 
            WHERE id = {$this->getId()}";
           
            $results = $this->conn->query($sql);
            
            if ($results > 0)
                return 1;
            else
                return 0;
        }

        public function excluirAutor($id):int{
            $this->setId($id);
            $sql = "DELETE FROM autor WHERE id='{$this->getId()}'";
            $results = $this->conn->query($sql);
            if ($results > 0)
                return 1;
            else
                return 0;
        }

        public function listarAutor():array{
            $sql = "SELECT * FROM autor ORDER BY nome ASC";
            
            $retorno = $this->conn->query($sql);

            $lista = array();//array dinâmico para armazenar os registos da tabela
            
            while($linha = $retorno->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }

        public function resgatarAutor($id):array{
            $this->setId($id);

            $sql = "SELECT * FROM autor WHERE id = '{$this->getId()}'";
            
            $retorno = $this->conn->query($sql);
            
            while($linha = $retorno->fetch_assoc()){ 
                $lista[] = $linha;
            }
            return $lista;
        }
    }
?>