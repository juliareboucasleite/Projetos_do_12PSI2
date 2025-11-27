<?php
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];
$operacao = $_POST['operacao'];

switch($operacao) {
    case 'soma':
        $resultado = $valor1 + $valor2;
        break;
    case 'subtracao':
        $resultado = $valor1 - $valor2;
        break;
    case 'multiplicacao':
        $resultado = $valor1 * $valor2;
        break;
    case 'divisao':
        $resultado = $valor1 / $valor2;
        break;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado: <?php echo $resultado; ?></h1>
    <p><a href="ex1.php">Voltar</a></p>
</body>
</html>