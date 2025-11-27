<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 9</title>
</head>
<body>    
    <h1>Exercício 9</h1>

    <?php
        $frutas = ["Maçã", "Banana", "Laranja", "Uva"]; 
        foreach ($frutas as $fruta) {
            echo "<li>{$fruta}</li>";
        }
    ?>
</body>
</html>