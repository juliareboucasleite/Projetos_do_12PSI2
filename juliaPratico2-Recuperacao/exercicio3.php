<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercício 3</title>
</head>
<body>
    <h3>Exercício 3</h3>
    <form method="post">
        <label>insira um número inteiro:</label>
        <input type="number" name="valor" required>
        <button type="submit">calcular média</button>
    </form>
    <?php
    if (isset($_POST['valor']) && is_numeric($_POST['valor']) && (int)$_POST['valor'] == $_POST['valor'] && $_POST['valor'] > 0) {
        $valor = (int)$_POST['valor'];
        $soma = 0;
        for ($i = 1; $i <= $valor; $i++) {
            $soma += $i;
        }
        $media = $soma / $valor;
        echo "média de: " . $media;
    }
    ?>
</body>
</html>