<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5</title>
</head>
<body>    
    <h1>Exercício 5</h1>

    <?php
        $palavra = "Programar";
        $i = 0;
        while ($i < strlen($palavra)) {
            echo $palavra[$i] . "<br>";
            $i++;
        }
    ?>
</body>
</html>