<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calcular IVA</title>
</head>
<body>
    <h3>Calcular IVA (23%)</h3>
    <form method="post">
        Preço (sem IVA): <input type="number" step="0.01" name="preco"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function calcularIVA($preco) {
            $iva = $preco * 0.23;
            $total = $preco + $iva;
            return array($iva, $total);
        }

        $preco = $_POST['preco'];
        list($iva, $total) = calcularIVA($preco);

        echo "<br><b>Valor do IVA:</b> €" . number_format($iva, 2, ',', '.');
        echo "<br><b>Preço Final:</b> €" . number_format($total, 2, ',', '.');
    }
    ?>
</body>
</html>
