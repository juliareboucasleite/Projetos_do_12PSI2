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
    <?php include 'includes/meta.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="container">
        <p class="h4 mb-4">Filmes em destaque</p>

        <div class="filmes">
        <?php foreach ($filmes as $filme) { ?>

            <div class="filme">
                <div class="imagem">
                    <a href="filme.php?id=<?= $filme['ID'] ?>"><img src="img/filmes/<?= $filme['imagem'] ?>" alt="<?= $filme['titulo'] ?>"></a>
                </div>
                <div class="titulo">
                    <a href="filme.php?id=<?= $filme['ID'] ?>"><?= $filme['titulo'] ?> (<?= $filme['ano'] ?>)</a>
                </div>
            </div>

        <?php } ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>