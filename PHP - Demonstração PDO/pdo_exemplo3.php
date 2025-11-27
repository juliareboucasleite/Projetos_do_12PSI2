<?php
	$filme = null;

	try
	{
		// Efetuar ligação à base de dados
		$db = new PDO('mysql:host=localhost;dbname=pdo_filmes;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        

		// Executar a consulta SQL e obter um registo da tabela filmes
		$resultado = $db->query('SELECT titulo, ano FROM filmes WHERE ID = 1');
		
		// Atribuir à variável $filme o resultado da consulta
        $filme = $resultado->fetch();
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
    <title>Exemplo 3 - PDO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	
</head>
<body>
	<h1 class="h3 mb-4">PDO - Exemplo 3</h1>
	<h2 class="h5 mb-4">Obter os dados de um filme específico (o filme com o ID 1)</h2>

	<p>Título: <?= $filme['titulo'] ?> - Ano: <?= $filme['ano'] ?></p>
</body>
</html>