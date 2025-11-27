<?php
/*
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    $mensagem = "";

    if ($codigo == 1) {
        $mensagem = "Operação bem sucedida";
    } else if ($codigo == 2) {
        $mensagem = "Operação não  foi bem sucedida";
    } else {
        $mensagem = "Condição não prevista";
    }
*/

if (!empty($_GET['codigo'])) {
    if($_GET['codigo'] == 1) {
        
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1 - Teste</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	
</head>
<body>
    <h1>Teste: Exercício 1</h1>
    <p class="fw-bold">Julia Reboucas Leite - Nº10</p>
    <p><?php echo $mensagem; ?></p>
</body>
</html>