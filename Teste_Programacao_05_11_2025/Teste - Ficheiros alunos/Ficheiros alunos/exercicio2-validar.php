<?php
    $max_username = 20;
    $max_idade = 3;
    $max_password = 100;
    
    function idade_valida($idade) {
        return filter_var($idade, FILTER_VALIDATE_INT) !== false && (int)$idade > 0;
    }
    $valido = true;
    $username  = isset($_POST['username'])  ? trim($_POST['username']) : '';
    $idade     = isset($_POST['idade'])     ? trim($_POST['idade']) : '';
    $password  = isset($_POST['password'])  ? $_POST['password'] : '';
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
    if (
        $username === '' ||
        $idade === '' ||
        $password === '' ||
        $password2 === ''
    ) {
        $valido = false;
    }
    elseif (mb_strlen($username) > $max_username) {
        $valido = false;
    }
    elseif (mb_strlen($idade) > $max_idade) {
        $valido = false;
    }
    elseif (mb_strlen($password) > $max_password || mb_strlen($password2) > $max_password) {
        $valido = false;
    }
    elseif (!idade_valida($idade)) {
        $valido = false;
    }
    elseif ($password !== $password2) {
        $valido = false;
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2 - Teste</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	    
</head>
<body>    
    <h1>Teste: Exercício 2</h1>
    <p class="fw-bold">Julia Reboucas Leite - Nº10</p>
    <h2 class="h4 mb-4">Dados recebidos</h2>

    <?php if (!$valido): ?>
        <div class="text-danger fw-bold">Dados inválidos</div><br>
    <?php else: ?>
        <div class="text-success fw-bold mb-3">Validação efetuada com sucesso.</div>
        <ul>
            <li><strong>Nome:</strong> <?php echo htmlspecialchars($username); ?></li>
            <li><strong>Idade:</strong> <?php echo (int)$idade; ?></li>
        </ul>
    <?php endif; ?>
    <p>
        &leftarrow; <a href="exercicio2-form.php">Voltar ao formulário</a>
    </p>
</body>
</html>