<?php
    include("../model/Editora.php");
    $editora = new Editora();
    $retonoEditora = $editora->listarEditora();
    ?>
    <table border="1">
        <th>NOME</th>
        <th>E-MAIL</th>
        <th>ENDEREÇO</th>
        <th>TELEFON</th>
        <th>CONTATO</th>
        <th>ALTERAR</th>
        <th>EXCLUIR</th>
    <?php
    foreach($retonoEditora as $value){
    ?>
        <tr>
            <td><?=$value["nome"];?></td>
            <td><?=$value["email"];?></td>
            <td><?=$value["endereco"];?></td>
            <td><?=$value["telefone"];?></td>
            <td><?=$value["contato"];?></td>
            <td><a href="formularioAlterarEditora.php?editora=<?php echo $value["id"];?>">ALTERAR</a></td>
            <td><a href="../controller/controllerEditora.php?acao=excluir&editora=<?php echo $value["id"];?>">EXCLUIR</a></td>
        <?php
    }
    ?>
    </table>
    <?php
?>