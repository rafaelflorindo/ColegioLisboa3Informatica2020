<?php
    include("../model/Autor.php");
    $autor = new Autor();
    $retonoAutor = $autor->listarAutor();
    ?>
    <table border="1">
        <th>NOME</th>
        <th>E-MAIL</th>
        <th>ALTERAR</th>
        <th>EXCLUIR</th>
    <?php
    foreach($retonoAutor as $value){
    ?>
        <tr>
            <td><?=$value["nome"];?></td>
            <td><?=$value["email"];?></td>
            <td><a href="formularioAlterar.php?autor=<?php echo $value["id"];?>">ALTERAR</a></td>
            <td><a href="../controller/controllerAutor.php?acao=excluir&autor=<?php echo $value["id"];?>">EXCLUIR</a></td>
        <?php
    }
    ?>
    </table>
    <?php
?>