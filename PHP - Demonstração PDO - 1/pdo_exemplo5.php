<?php

	// Definir um ano inicial
    $ano = 1900;
	
    // Verificar se ocorreu um pedido GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Verificar se existe o parâmetro ano
        if (!empty($_GET['ano'])) {
            // Higienizar os dados recebidos através de GET
            $ano = filter_input(INPUT_GET, 'ano', FILTER_SANITIZE_NUMBER_INT);
			
			// Validar o ano: se não for um valor inteiro válido, atribuir um ano por defeito
			if (!filter_var($ano, FILTER_VALIDATE_INT)) {
				$ano = 1900;
			}
        }
    }
	
	$filmes = null;
	
	try
	{
		// Efetuar ligação à base de dados
		$db = new PDO('mysql:host=localhost;dbname=pdo_filmes;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Esta consulta tem um parâmetro identificado pelo caracter ?
		$stmt = $db->prepare('SELECT  titulo, ano, duracao, url_imdb, R.nome AS realizador FROM filmes F, realizadores R WHERE F.realizador_ID = R.ID AND ano >= ?');
        
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
    <title>Exemplo 5 - PDO</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
	<h1 class="h3 mb-4">PDO - Exemplo 5</h1>
	<h2 class="h5 mb-4">Obter os dados de todos os filmes a partir de um determinado ano especificado pelo utilizador</h2>

	<p>Filmes a partir do ano <span class="fw-bold"><?= $ano ?></span></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Ano</th>
                <th>Duração</th>
                <th>IMDB</th>
                <th>Realizador</th>
            </tr>
        </thead>
        <tbody>
			<?php if (empty($filmes)) { ?>
								
				<tr><td colspan="5">Sem dados para mostrar</tr>
					
			<?php
				} else {				
					foreach ($filmes as $filme) {
			?>
				
			<tr>
				<td><?= $filme['titulo'] ?></td>
				<td><?= $filme['ano'] ?></td>
				<td><?= $filme['duracao'] ?></td>
				<td><a href="<?= $filme['url_imdb'] ?>" target="_blank">IMDB</a></td>
				<td><?= $filme['realizador'] ?></td>
			</tr>
			
			<?php
					}
				}
			?>
	
        </tbody>
    </table>

    <form class="mt-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label for="ano">Ano:</label>
        <input name="ano" id="ano" type="text" size="5" maxlength="4">
        <button type="submit">OK</button>
    </form>
</body>
</html>