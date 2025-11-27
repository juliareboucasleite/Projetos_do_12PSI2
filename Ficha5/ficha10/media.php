<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Média de Notas</title>
</head>
<body>
    <h3>Calcular Média de 3 Notas</h3>
    <form method="post">
        Nota 1: <input type="number" name="n1"><br>
        Nota 2: <input type="number" name="n2"><br>
        Nota 3: <input type="number" name="n3"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function mediaNotas($a, $b, $c) {
            return round(($a + $b + $c) / 3);
        }

        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $n3 = $_POST['n3'];

        echo "<br><b>Média:</b> " . mediaNotas($n1, $n2, $n3);
    }
    ?>
</body>
</html>
