<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questao 3</title>
</head>
<body>
    <h1>Questao 3</h1>
    <form method="post">
        digite um número: <input type="number" name="numero">
        <input type="submit" value="calcular">
    </form>
    <?php
    if (isset($_POST["numero"])) {
        $n = $_POST["numero"];
        $soma = 0;
        $i = 1;
        while ($i <= $n) {
            $soma = $soma + $i;
            $i = $i + 1;
        }
        echo "a soma de 1 até $n é $soma";
    }
    ?>
</body>
</html>