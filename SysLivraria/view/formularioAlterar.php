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
    if(!empty($_GET['autor']) && isset($_GET['autor'])){
        $id = (int)$_GET['autor']; 
        include("../model/Autor.php");
        $autor = new Autor();
        $retonoAutor = $autor->resgatarAutor($id);

        ?>
    <div><h2>ALTERAR AUTOR</h2></div>
    <form action="../controller/controllerAutor.php" method="post">
        <div>
            <label>Nome: </label>
            <input type="text" name = "nome" value="<?=$retonoAutor[0]["nome"]?>" required>
        </div>
        <div>
            <label>E-mail: </label>
            <input type="text" name = "email" value="<?=$retonoAutor[0]["email"]?>" required>
        </div>
        <div>
            <input type="hidden" name="acao" value="alterar">
            <input type="hidden" name="autor" value="<?=$retonoAutor[0]["id"]?>">
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