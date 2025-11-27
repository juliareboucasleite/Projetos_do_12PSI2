<?php
require_once 'config.php';

$conexao = conectarBD();

$sql = "SELECT id_candidatura, nome, data_nascimento, documento, nr_documento, 
               escolaridade, estabelecimento, situacao 
        FROM Candidaturas 
        ORDER BY id_candidatura DESC";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro ao consultar candidaturas: " . mysqli_error($conexao));
}

$candidaturas = [];
while ($linha = mysqli_fetch_assoc($resultado)) {
    $candidaturas[] = $linha;
}

fecharBD($conexao);
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidaturas - ESAB</title>
</head>
<body>
    <h1>Lista de Candidaturas</h1>
    
    <?php if (empty($candidaturas)): ?>
        <p>Não existem candidaturas registadas.</p>
    <?php else: ?>
        <p>Total de candidaturas: <strong><?php echo count($candidaturas); ?></strong></p>
        
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Documento</th>
                    <th>Nº Documento</th>
                    <th>Escolaridade</th>
                    <th>Estabelecimento</th>
                    <th>Situação Profissional</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($candidaturas as $candidatura): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($candidatura['id_candidatura']); ?></td>
                        <td><?php echo htmlspecialchars($candidatura['nome']); ?></td>
                        <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($candidatura['data_nascimento']))); ?></td>
                        <td><?php echo htmlspecialchars($candidatura['documento']); ?></td>
                        <td><?php echo htmlspecialchars($candidatura['nr_documento']); ?></td>
                        <td><?php echo htmlspecialchars($candidatura['escolaridade'] ?? '-'); ?></td>
                        <td><?php echo htmlspecialchars($candidatura['estabelecimento'] ?? '-'); ?></td>
                        <td><?php echo htmlspecialchars($candidatura['situacao'] ?? '-'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    
    <p><a href="index.php">Nova candidatura</a></p>
</body>
</html>

