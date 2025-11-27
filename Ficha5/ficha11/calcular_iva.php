<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cálculo do IVA</title>
</head>
<body>
    <h2>Calcular IVA</h2>
    <form method="post">
        <label>Preço sem IVA (€):</label>
        <input type="number" step="0.01" name="preco" required>
        <input type="submit" value="Calcular">
    </form>
    <?php
    function calcularIVA($preco) {
        $iva = $preco * 0.23;
        $total = $preco + $iva;
        return array($iva, $total);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $preco = $_POST["preco"];
        list($iva, $total) = calcularIVA($preco);
        echo "<p>Valor do IVA: €" . number_format($iva, 2, ',', '.') . "</p>";
        echo "<p>Preço total a pagar: €" . number_format($total, 2, ',', '.') . "</p>";
    }
    ?>
</body>
</html>
