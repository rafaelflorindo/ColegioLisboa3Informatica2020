<?php
if (!empty($_POST)) {
    if (isset($_POST['acao']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['contato'])){
        if (!empty($_POST['acao']) && !empty($_POST['nome']) && !empty($_POST['contato']) && !empty($_POST['telefone']) && !empty($_POST['endereco']) && !empty($_POST['contato'])) {
            $acao = $_POST['acao'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $contato = $_POST['contato'];


            include("../model/Editora.php");
            $autor = new Editora();

            if($acao == "adicionar"){
                $resultado= $autor->adicionarEditora($nome, $email, $telefone, $endereco, $contato); 
                echo $resultado;
            }elseif($acao== "alterar"){
                if (!empty($_POST['editora']) && isset($_POST['editora'])){
                    $id = $_POST['editora'];
                    $resultado = $autor->alterarEditora($id, $nome, $email, $telefone, $endereco, $contato);      
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
     && isset($_GET['acao']) && !empty($_GET['editora']) && isset($_GET['editora'])){
        $acao = $_GET['acao'];
        $id = $_GET['editora'];

        if ($acao ==  "excluir"){
            include("../model/Editora.php");
            $editora = new Editora();
            $resultado = $editora->excluirEditora($id);
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