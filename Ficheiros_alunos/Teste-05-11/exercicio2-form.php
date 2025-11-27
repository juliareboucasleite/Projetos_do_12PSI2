<?php
    echo '<form method="POST" action="exercicio2-validar.php">';
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
    <h2 class="h4">Registo de utilizador</h4>

    <form>
        <div class="mt-2">
            <label for="username" class="form-label">Nome:</label><br>
            <input id="username" class="form-control" name="username" type="text" maxlength="20">
        </div>
        <div class="mt-2">
            <label for="idade" class="form-label">Idade:</label><br>
            <input id="idade" class="form-control" name="idade" type="text" maxlength="3">
        </div>
        <div class="mt-2">
            <label for="password" class="form-label">Password:</label><br>
            <input id="password" class="form-control" name="password" type="password" maxlength="100">
        </div>
        <div class="mt-2">
            <label for="password2" class="form-label">Password (confirmação):</label><br>
            <input id="password2" class="form-control" name="password2" type="password" maxlength="100">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Submeter</button>
        </div>
    </form>
</body>
</html>