<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 10</title>
</head>
<body>    
    <h1>Exercício 10</h1>

    <?php
        $pessoas = ["Ana" => 20, "Carlos" => 25, "Maria" => 22]; 

        foreach ($pessoas as $nome => $idade) {
            echo "<li>{$nome}: {$idade} anos</li>";
        }
    ?>
</body>
</html>