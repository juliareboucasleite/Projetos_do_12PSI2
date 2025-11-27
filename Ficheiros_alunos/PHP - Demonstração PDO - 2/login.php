<?php
require_once 'inc/database.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmex</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form>
            <img class="mb-4" src="img/filmex-logo.webp" alt="Filmex">
                <h1 class="h2 mb-3">Iniciar sessão</h1>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="email@example.com">
                    <label for="floatingInput">Endereço de email</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="mt-3 mb-3">
                    <a href="recover.php">Esqueci-me da password</a>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Submeter</button>

                <div class="mt-4">
                    <div class="fw-bold mb-2">Não tem conta?</div>
                    <div><a href="signup.php">Criar conta</a></div>
                </div>

                <p class="mt-5 mb-3 text-body-secondary">
                    &copy; Filmex <?= date("Y") ?><br>
                    Todos os direitos reservados
                </p>
            </form>
    </main>
</body>
</html>
