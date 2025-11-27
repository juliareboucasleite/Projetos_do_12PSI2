<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Ficha 13 - Exercício 2: Mês e Quantidade de Dias</title>
</head>
<body>
    <h1>Exercício 2: Mês e Quantidade de Dias</h1>
    <p>Introduza um número de 1 a 12 (mês) e um ano para verificar se é bissexto:</p>
    <form action="mes.php" method="POST">
        <p>
            <label for="mes">Mês (1-12):</label>
            <input type="number" id="mes" name="mes" min="1" max="12" required>
        </p>
        <p>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" min="1" required>
        </p>
        <p>
            <input type="submit" value="Verificar">
        </p>
    </form>
    <p><a href="index.php">← Voltar à lista de exercícios</a></p>
</body>
</html>
