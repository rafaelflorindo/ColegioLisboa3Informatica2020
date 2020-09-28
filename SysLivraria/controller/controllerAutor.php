<?php
if (!empty($_POST)) {
    if (isset($_POST['acao']) && isset($_POST['nome']) && isset($_POST['email'])){
        if (!empty($_POST['acao']) && !empty($_POST['nome']) && !empty($_POST['email'])) {
            $acao = $_POST['acao'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            include("../model/Autor.php");
            $autor = new Autor();

            if($acao == "adicionar"){
                $resultado= $autor->adicionarAutor($nome, $email); 
                echo $resultado;
            }elseif($acao== "alterar"){
                if (!empty($_POST['autor']) && isset($_POST['autor'])){
                    $id = (int)$_POST['autor']; 
                    $resultado = $autor->alterarAutor($id, $nome, $email);      
                    echo $resultado;    
                }
            }
        } else 
            return "Erro";
    } else 
        return "Erro";
} 
elseif(!empty($_GET)){
    if(!empty($_GET['acao'])
     && isset($_GET['acao']) && !empty($_GET['autor']) && isset($_GET['autor'])){
        $acao = $_GET['acao'];
        $id = (int)$_GET['autor']; 

        if ($acao ==  "excluir"){
            include("../model/Autor.php");
            $autor = new Autor();
            $resultado = $autor->excluirAutor($id);
            echo $resultado;
        }
    }
}

    
        

    


    
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