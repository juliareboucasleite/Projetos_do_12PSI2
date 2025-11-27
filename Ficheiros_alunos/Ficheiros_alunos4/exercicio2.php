<?php
	$musica = null;

	try
	{
		// Efetuar ligação à base de dados
		$db = new PDO('mysql:host=localhost;dbname=musicas;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        

		// Executar a consulta SQL e obter um registo da tabela musicas
		$resultado = $db->query('SELECT * FROM musicas WHERE id = 1');
		
		// Atribuir à variável $musica o resultado da consulta
        $musica = $resultado->fetch();
	}
	catch (PDOException $e)
	{
		echo "Ocorreu o seguinte erro: " . $e->getMessage() . "<br>";
	}
	finally
	{
		$db = null;
	}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	
</head>
<body>
	<main class="container">
		<h1 class="h3 mb-4">Exercício 2</h1>
		<h2 class="h5 mb-4">Obter os dados de uma música específica (a música com o ID 1)</h2>
		
		<form class="row g-3">
			<div class="col-12">
				ID: <span class="fw-bold"><?= $musica['id'] ?></span>
			</div>

			<div class="col-12">
				<label for="titulo" class="form-label">Título</label>
				<input type="text" class="form-control" id="titulo" name="titulo" value="<?= $musica['titulo'] ?>">
			</div>

			<div class="col-md-6">
				<label for="ano" class="form-label">Ano de lançamento</label>
				<input type="text" class="form-control" id="ano" name="ano_lancamento" value="<?= $musica['ano_lancamento'] ?>">
			</div>

			<div class="col-md-6">
				<label for="duracao" class="form-label">Duração (em segundos)</label>
				<input type="text" class="form-control" id="duracao_segundos" name="duracao_segundos" value="<?= $musica['duracao_segundos'] ?>">
			</div>	
		</form>
	</main>
</body>
</html>