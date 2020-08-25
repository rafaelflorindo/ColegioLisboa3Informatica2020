<?php
class Produto{
  public $codigo, $nome, $preco;

  public function setCodigo($codigo){
    $this->codigo = $codigo;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function alterarPreco($preco){
    $this->preco = $preco;
  }
  public function getCodigo(){
    return $this->codigo;
  }
  public function getNome(){
    return $this->nome;
  }
  public function getPreco(){
    return $this->preco;
  }
}
?>
