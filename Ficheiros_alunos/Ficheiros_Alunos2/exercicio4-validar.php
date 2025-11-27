<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
</head>
<body>    
    <h1>Exercício 4 - Validar dados</h1>

    <?php
        if(!empty($_POST["nome"])) {
            echo "Olá {$_POST['nome']}";
        } else {
            echo "Não foi fornecido um nome";
        }
    ?>
</body>
</html>