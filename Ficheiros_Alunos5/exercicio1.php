<?php /* chamo o php para incluir o ficheiro musicas.php */
	include 'includes/musicas.php'; //chave primaria do registo a eliminar
	$resultado =null; //resultado da função getNumeroMusicas
	$musicas = getMusicas(); //resultado da função getMusicas
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if(!empty($_GET['id'])) {
			$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
			if(filter_var($id, FILTER_VALIDATE_INT)) {
				$resultado = eliminarMusica($id);
			}
		}
	}
	$musicas = getMusicas();
	?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	
</head>
<body>
	<h1 class="h3 mb-4">Exercício 1</h1>
	<?php if($resultado != null && $resultado == true) { ?>
		<div class="alert alert-success" role="alert">
			Musica eliminada com sucesso
		</div>
	<?php } else if ($resultado !== null) { ?>
		<div class="alert alert-danger" role="alert">
			Erro ao eliminar a musica
		</div>
	<?php } ?>

	<p Registos: <span class="fw-bold"> <?= getNumeroMusicas() ?></span></p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ano</th>
                <th>Duração</th>
                <th>Músico(a)</th>
				<th> &nbsp; </th>
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
				<td>
					<a class="btn btn-danger" href="exercicio1.php?id=<?= $musica['id'] ?>">Eliminar</a>
				</td>
			</tr>			
			<?php } ?>	
        </tbody>
    </table>
</body>
</html>