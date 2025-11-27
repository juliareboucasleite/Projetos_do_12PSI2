<?php
declare(strict_types=1);

require_once 'includes/Database.php';
require_once 'includes/filmes.php';

$filmes = getFilmes();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmex</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">  
</head>
<body>
    <header class="container">
        <h1>Filmex</h1>
        <h2>A sua plataforma de streaming</h2>
        <p><a href="login.php">Login</a></p>
    </header>

    <main class="container mt-4 mb-4">
        <p class="h4 mb-4">Filmes em destaque</p>

        <div class="filmes">
        <?php foreach ($filmes as $filme) { ?>

            <div class="filme">
                <div class="imagem">
                    <a href="filme.php?=<?= $filme['ID'] ?>"><img src="img/filmes/<?= $filme['imagem'] ?>" alt="<?= $filme['titulo'] ?>"></a>
                </div>
                <div class="titulo">
                    <a href="filme.php?=<?= $filme['ID'] ?>"><?= $filme['titulo'] ?></a> (<?= $filme['ano'] ?>)
                </div>
            </div>

        <?php } ?>
        </div>
    </main>

    <footer>
        <div class="container">
            &copy; Filmex <?= date("Y") ?> Todos os direitos reservados
        </div>
    </footer>
</body>
</html>