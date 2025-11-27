<?php

    // Resultado da operação DELETE (inicialmente com o valor false)
    $resultado = false;

    // Número de registos afetados pela operação DELETE
    $registosAfetados = 0;

    try
    {
        // Efetuar ligação à base de dados
        $db = new PDO('mysql:host=localhost;dbname=pdo_filmes;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        // Esta consulta tem um named parameter (é precedido pelo caracter :)
        $stmt = $db->prepare('DELETE FROM filmes WHERE ID = :id;');

        // Atribuir dados aos parâmetros
        $stmt->bindValue(':id', 7, PDO::PARAM_INT);

        // Executar a consulta e verificar se foi bem sucedida
        $resultado = $stmt->execute();

        // Obter o número de registos afetados pela operação DELETE.
        // Ou seja, se foi afetado um registo, significa que o filme com o ID especificado existia e foi eliminado com sucesso.
        $registosAfetados = $stmt->rowCount();
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
    <title>Exemplo 8 - PDO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <h1 class="h3 mb-4">PDO - Exemplo 8</h1>
	<h2 class="h5 mb-4">Eliminar um filme</h2>

    <p>Resultado:</p>

    <?php if ($resultado) { ?>
            
        <p class="text-success fw-bold">Sucesso</p>

    <?php } else { ?>

        <p class="text-danger fw-bold">Insucesso</p>

    <?php } ?>

    <p>Número de registos afetados pela operação DELETE: <span class="fw-bold"><?= $registosAfetados ?></span></p>
</body>
</html>