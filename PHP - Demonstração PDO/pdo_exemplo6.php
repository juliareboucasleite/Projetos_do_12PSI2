<?php

    // Chave primária do novo registo inserido (inicialmente com o valor null)
    $id = null;
    
    try
    {
        // Efetuar ligação à base de dados
        $db = new PDO('mysql:host=localhost;dbname=pdo_filmes;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        // Esta consulta tem vários named parameters (são precedidos pelo caracter :)
        $stmt = $db->prepare('INSERT INTO filmes (titulo, ano, duracao, url_imdb, realizador_id) VALUES (:titulo, :ano, :duracao, :url_imdb, :realizador_id)');

        // Atribuir dados aos parâmetros
        $stmt->bindValue(':titulo', 'Scott Pilgrim vs. the World', PDO::PARAM_STR);
        $stmt->bindValue(':ano', 2010, PDO::PARAM_INT);
        $stmt->bindValue(':duracao', 112, PDO::PARAM_INT);
        $stmt->bindValue(':url_imdb', 'https://www.imdb.com/title/tt0446029', PDO::PARAM_STR);            
        $stmt->bindValue(':realizador_id', 4, PDO::PARAM_INT);

        // Executar a consulta e verificar se foi bem sucedida
        if ($stmt->execute() === true)
        {
            // Obter a chave primária do novo registo inserido
            $id = $db->lastInsertId();
        }
    }
    catch (PDOException $e)
    {
        echo "Ocorreu o seguinte erro: " . $e->getMessage() . "<br>";
    }
    finally {
        $db = null;
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo 6 - PDO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <h1 class="h3 mb-4">PDO - Exemplo 6</h1>
	<h2 class="h5 mb-4">Inserir um novo filme</h2>

    <p>Resultado:</p>

    <?php if ($id !== null) { ?>
            
        <p class="text-success fw-bold">O novo registo foi inserido com sucesso (chave primária do novo registo: <span class="fw-bold"><?= $id ?></span>)</p>

    <?php } else { ?>

        <p class="text-danger fw-bold">Ocorreu um erro ao inserir o novo registo.</p>

    <?php } ?>
</body>
</html>