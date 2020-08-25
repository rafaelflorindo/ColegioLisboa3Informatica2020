<?php
    include("../model/Autor.php");

    $autor = new Autor();
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    
    $autor->adicionarAutor($nome, $email);
    $retonoAutor = $autor->listarAutor();
    print_r($retonoAutor);

    /* 
    //incluir
    $nome = "Maria";//$_POST["nome"];
    $email = "maria@hotmail.com";
    
    $autor->adicionarAutor($nome, $email);
    */

    /*
    //alterar
    $nome = "Telma";//$_POST["nome"];
    $email = "telma@hotmail.com";
    $id = 2;

    $autor->alterarAutor($id, $nome, $email);
    */
    //deletar
    /*$id = 5;
    $autor->excluirAutor($id);
    */
    //resgatar autor

    /*
    //resgatar autor
    $id = 6;
    $retonoAutor = $autor->resgatarAutor($id);
    print_r($retonoAutor);
    */
    /*
    $retonoAutor = $autor->listarAutor();
    //var_dump($retonoAutor);

    foreach($retonoAutor as $value){
        echo "<br>Nome = " . $value["nome"];
        echo "<br> E-mail = ". $value["email"];
        echo "<hr>";
    }
*/

?>