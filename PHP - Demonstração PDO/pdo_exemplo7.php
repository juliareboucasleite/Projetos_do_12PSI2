<?php

    // Resultado da operação UPDATE (inicialmente com o valor false)
    $resultado = false;

    try
    {
        // Efetuar ligação à base de dados
        $db = new PDO('mysql:host=localhost;dbname=pdo_filmes;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        // Esta consulta tem vários named parameters (são precedidos pelo caracter :)
        $stmt = $db->prepare('UPDATE filmes SET titulo = :titulo WHERE ID = :id;');

        // Atribuir dados aos parâmetros
        $stmt->bindValue(':id', 7, PDO::PARAM_INT);
        $stmt->bindValue(':titulo', 'Scott Pilgrim contra o Mundo', PDO::PARAM_STR);

        // Executar a consulta e verificar se foi bem sucedida
        $resultado = $stmt->execute();
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
    <title>Exemplo 7 - PDO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <h1 class="h3 mb-4">PDO - Exemplo 7</h1>
	<h2 class="h5 mb-4">Editar um filme</h2>

    <p>Resultado:</p>

    <?php if ($resultado) { ?>
            
        <p class="text-success fw-bold">Sucesso</p>

    <?php } else { ?>

        <p class="text-danger fw-bold">Insucesso</p>

    <?php } ?>
</body>
</html>