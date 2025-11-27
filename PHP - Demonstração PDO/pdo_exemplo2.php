<?php
	$filmes = null;

	try
	{
		// Efetuar ligação à base de dados
		$db = new PDO('mysql:host=localhost;dbname=pdo_filmes;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Executar uma consulta SQL e obter os registos da tabela filmes
		$stmt = $db->query('SELECT titulo, ano FROM filmes');
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
    <title>Exemplo 2 - PDO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	
</head>
<body>
	<h1 class="h3 mb-4">PDO - Exemplo 2</h1>
	<h2 class="h5 mb-4">Obter os dados de todos os filmes e mostrar numa lista não ordenada</h2>

    <ul>
	<?php
		foreach($filmes as $filme)
		{
			echo "<li>Título: {$filme['titulo']} - Ano: {$filme['ano']}</li>";
		}
	?>
    </ul>

</body>
</html>