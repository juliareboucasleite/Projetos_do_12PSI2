<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 7</title>
</head>
<body>
    <h1>Exercício 7</h1>

    <ul>
    <?php
        //somar numeros de 5 a 120 menos 11 e 31
        $resultado = 0;
        for ($i = 5; $i <= 120; $i++) {
            if (!($i >= 11 && $i <= 31)) {
                $resultado += $i;
            }
        }
        echo "<li>O resultado é {$resultado}</li>";
    ?>
    </ul>
</body>
</html>