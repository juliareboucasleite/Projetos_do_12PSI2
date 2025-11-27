<?php
	$musicas = null;

	try
	{
		// Efetuar ligação à base de dados
		$db = new PDO('mysql:host=localhost;dbname=musicas;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Executar uma consulta SQL e obter os registos da tabela musicas
		$stmt = $db->query('SELECT musicas.id, titulo, ano_lancamento, duracao_segundos, musicos.nome FROM musicas, musicos WHERE musicas.musico_id = musicos.id');
		$musicas = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Exercício 4</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	
</head>
<body>
	<h1 class="h3 mb-4">Exercício 4</h1>
	<h2 class="h5 mb-4">Obter os dados de todas as músicas e mostrar o resultado numa tabela</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ano</th>
                <th>Duração</th>
                <th>Músico(a)</th>
            </tr>
        </thead>
        <tbody>
			<?php foreach($musicas as $musica) { ?>
			<tr>
				<td><?= $musica['id'] ?></td>
				<td><?= $musica['titulo'] ?></td>
				<td><?= $musica['ano_lancamento'] ?></td>
				<td><?= $musica['duracao_segundos'] ?></td>
				<td><?= $musica['nome'] ?></td>
			</tr>			
			<?php } ?>	
        </tbody>
    </table>
</body>
</html>