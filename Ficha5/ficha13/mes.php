<?php
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$meses = array(
    1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril",
    5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto",
    9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro"
);

$dias = array(
    1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30,
    7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31
);

// Verificar se é bissexto
if (($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0)) {
    $dias[2] = 29;
    $bissexto = "sim";
} else {
    $bissexto = "não";
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado:</h1>
    <p>Mês: <?php echo $meses[$mes]; ?></p>
    <p>Dias: <?php echo $dias[$mes]; ?></p>
    <p>Ano bissexto: <?php echo $bissexto; ?></p>
    <p><a href="ex2.php">Voltar</a></p>
</body>
</html>
