<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questao</title>
</head>
<body>
    <h1> Exericio 1</h1>
    <?php
        $numero = 2;
        if ($numero > 0) {
            echo "$numero é um valor positivo.";
        } elseif ($numero < 0) {
            echo "$numero é um valor negativo.";
        } else  {
            echo "$numero é igual a zero.";
        }
    ?>
</body>
</html>