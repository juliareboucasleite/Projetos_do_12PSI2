<?php
    // Inicializar a variável de mensagem
    $mensagem = "";

    // Verificar se o parâmetro codigo foi enviado por GET
    if (!empty($_GET['codigo'])) {
        // Validar e obter o código como inteiro
        $codigo = filter_input(INPUT_GET, 'codigo', FILTER_VALIDATE_INT);

        // Verificar se o código é válido (é um inteiro)
        if ($codigo !== false) {
            // Verificar o valor do código e definir a mensagem apropriada
            if ($codigo == 1) {
                $mensagem = "Operação bem sucedida";
            } else if ($codigo == 2) {
                $mensagem = "Operação não foi bem sucedida";
            } else {
                $mensagem = "Condição não prevista";
            }
        } else {
            // Se o código não for um inteiro válido
            $mensagem = "Código inválido (deve ser um número inteiro)";
        }
    } else {
        // Se o parâmetro codigo não foi fornecido
        $mensagem = "Parâmetro codigo não fornecido";
    }
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
    <p><?php echo htmlspecialchars($mensagem); ?></p>
</body>
</html>