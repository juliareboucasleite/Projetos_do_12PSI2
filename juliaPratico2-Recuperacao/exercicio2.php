<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercício 2</title>
</head>
<body>
    <h3>Exercício 2</h3>
    <form method="post">
        <label>selecione a posição:</label>
        <select name="posicao">
            <option value="1">1º lugar</option>
            <option value="2">2º lugar</option>
            <option value="3">3º lugar</option>
        </select>
        <button type="submit">Ver pódio</button>
    </form>
    <?php
    function podium($posicao) {
        switch ($posicao) {
            case 1: return "ouro";
            case 2: return "prata";
            case 3: return "bronze";
        }
    }

    if (isset($_POST['posicao'])) {
        echo "medalha de: " . podium((int)$_POST['posicao']);
    }
    ?>
    
</body>
</html>