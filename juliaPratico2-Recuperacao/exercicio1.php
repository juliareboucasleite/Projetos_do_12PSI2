<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>
    <h3>Verifica temperatura</h3>
    <?php
    $temperatura = 15; 
    if ($temperatura < 10) {
        echo "frio";
    } else if ($temperatura >= 10 && $temperatura <= 25) {
        echo "ameno";
    } else if ($temperatura > 25 && $temperatura <= 30) {
        echo "quente";
    } else if ($temperatura > 30) {
        echo "muito calor";
    }
    ?>
</body>
</html>