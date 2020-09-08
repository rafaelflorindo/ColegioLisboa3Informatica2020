<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(!empty($_GET)){
    if(!empty($_GET['editora']) && isset($_GET['editora'])){
        $id = $_GET['editora']; 
        include("../model/Editora.php");
        $editora = new Editora();
        $retornoEditora = $editora->resgatarEditora($id);
        ?>
    <div><h2>ALTERAR editora</h2></div>
    <form action="../controller/controllerEditora.php" method="post">
        <div>
            <label>Nome: </label>
            <input type="text" name = "nome" value="<?=$retornoEditora[0]["nome"]?>" required>
        </div>
        <div>
            <label>E-mail: </label>
            <input type="text" name = "email" value="<?=$retornoEditora[0]["email"]?>" required>
        </div>
        <div>
            <label>Endereço: </label>
            <input type="text" name = "endereco" value="<?=$retornoEditora[0]["endereco"]?>" required>
        </div>
        <div>
            <label>Telefone: </label>
            <input type="text" name = "telefone" value="<?=$retornoEditora[0]["telefone"]?>" required>
        </div>
        <div>
            <label>Contato: </label>
            <input type="text" name = "contato" value="<?=$retornoEditora[0]["contato"]?>" required>
        </div>
        <div>
            <input type="hidden" name="acao" value="alterar">
            <input type="hidden" name="editora" value="<?=$retornoEditora[0]["id"]?>">
            <input type="submit" value = "ENVIAR">
        </div>
    </form>
    <?php    
    } else
    echo "Não há campos";
}else
echo "Não há dados";
?>
</body>
</html>