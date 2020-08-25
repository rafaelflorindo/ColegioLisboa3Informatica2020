<?php
  include("classeProduto.php");

  $objetoProduto = new Produto();

  $codigo = $_POST["codigo"];
  $nome =  $_POST["nome"];
  $preco  = $_POST["preco"];

  $objetoProduto->setNome($nome);
  $objetoProduto->setCodigo($codigo);
  $objetoProduto->alterarPreco($preco);

  //estática
  /*
  $objetoProduto->setNome("Monitor");
  $objetoProduto->setCodigo("123");
  $objetoProduto->alterarPreco(258.00);
  */

  echo "<br>Código: " . $objetoProduto->getCodigo();
  echo "<br>Nome: " . $objetoProduto->getNome();
  echo "<br>Preço: " . $objetoProduto->getPreco();
?>
