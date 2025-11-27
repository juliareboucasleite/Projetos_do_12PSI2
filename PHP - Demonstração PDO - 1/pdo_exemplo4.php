<?php
	$filmes = null;

	try
	{
		// Efetuar ligação à base de dados
		$db = new PDO('mysql:host=localhost;dbname=pdo_filmes;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// Especificar nesta variável o ano a partir do qual se pretendem obter os filmes
		$ano = 2000;

		// Esta consulta tem um parâmetro identificado pelo caracter ?
        $stmt = $db->prepare('SELECT titulo, ano FROM filmes WHERE ano >= ?');
		
		// Atribuir ao parâmetro a variável $ano e especificar que irá conter um valor numérico
        $stmt->bindValue(1, $ano, PDO::PARAM_INT);
		
		// Executar a consulta
        $stmt->execute();
		
		// Atribuir à variável $filmes o resultado da consulta
        $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);		
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
    <title>Exemplo 4 - PDO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	    
</head>
<body>
	<h1 class="h3 mb-4">PDO - Exemplo 4</h1>
	<h2 class="h5 mb-4">Obter os dados de todos os filmes a partir de um dado ano; o ano é especificado através de um parâmetro numérico inteiro</h2>

    <?php
        foreach($filmes as $filme)
        {
            echo "Título: {$filme['titulo']} - Ano: {$filme['ano']}<br>";
        }
    ?>
</body>
</html>