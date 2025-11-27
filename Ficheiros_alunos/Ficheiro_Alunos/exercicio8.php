<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 8</title>
</head>
<body>    
    <h1>Exercício 8</h1>

    <?php
        $resultado = 0;
        $temperaturas = [10, 10, 9, 9.8, 10.5, 8.7, 13, 9, 14, 14.1, 13.9, 12, 12.1, 15];

        for ($i = 0, $n = count($temperaturas); $i < $n; ++$i) { 
            $resultado += $temperaturas[$i];
        }

        echo "Resultado: {$resultado}";
    ?>
</body>
</html>