<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Editora</title>
    <!--<script src="../js/validar.js"></script>-->
</head>
<body>
<div><h2>CADASTRAR EDITORA</h2></div>
    <form action="../controller/controllerEditora.php" method="post" id="frm" name="frm">
        <div>
            <label>Nome: </label><input type="text" name = "nome" id="nome">
        </div>
        <div>
            <label>E-mail: </label><input type="text" name = "email" id="email">
        </div>
        <div>
            <label>Telefone: </label><input type="text" name = "telefone" id="telefone">
        </div>
        <div>
            <label>Endereço: </label><input type="text" name = "endereco" id="endereco">
        </div>
        <div>
            <label>Contato: </label><input type="text" name = "contato" id="contato">
        </div>
        <div>
            <input type="hidden" name="acao" value="adicionar">
            <input type="submit" value = "ENVIAR">
        </div>
    </form>
</body>
</html>