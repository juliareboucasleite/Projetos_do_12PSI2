<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>    
    <h1>Exercício 2</h1>

    <?php
        if (!empty($_GET["nome"])) {
            $nome = $_GET["nome"];
            echo "Olá $nome";
        } else {
            echo "Não foi fornecido um nome";
        }
    ?>
</body>
</html>