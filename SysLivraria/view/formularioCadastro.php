<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script src="../js/validar.js"></script>-->
</head>
<body>
<div><h2>CADASTRAR AUTOR</h2></div>
    <form action="../controller/controllerAutor.php" method="post" id="frm" name="frm"
    onsubmit="return validaForm(this);">
        <div>
            <label>Nome: </label><input type="text" name = "nome" id="nome">
        </div>
        <div>
            <label>E-mail: </label><input type="text" name = "email" id="email">
        </div>
        <div>
            <input type="hidden" name="acao" value="adicionar">
            <input type="submit" value = "ENVIAR">
        </div>
    </form>
</body>
</html>