<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$data_nascimento = isset($_POST['data_nascimento']) ? trim($_POST['data_nascimento']) : '';
$documento = isset($_POST['documento']) ? trim($_POST['documento']) : '';
$nr_documento = isset($_POST['nr_documento']) ? trim($_POST['nr_documento']) : '';
$escolaridade = isset($_POST['escolaridade']) ? trim($_POST['escolaridade']) : null;
$estabelecimento = isset($_POST['estabelecimento']) ? trim($_POST['estabelecimento']) : null;
$situacao = isset($_POST['situacao']) ? trim($_POST['situacao']) : null;

$erros = [];
$sucesso = false;
$mensagem = '';

if (empty($nome)) {
    $erros[] = 'O nome é obrigatório.';
} elseif (strlen($nome) > 45) {
    $erros[] = 'O nome não pode exceder 45 caracteres.';
}

if (empty($data_nascimento)) {
    $erros[] = 'A data de nascimento é obrigatória.';
} else {
    $data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
    if (!$data || $data->format('Y-m-d') !== $data_nascimento) {
        $erros[] = 'A data de nascimento deve estar no formato válido.';
    }
}

if (empty($documento)) {
    $erros[] = 'O documento de identificação é obrigatório.';
} elseif (strlen($documento) > 45) {
    $erros[] = 'O tipo de documento não pode exceder 45 caracteres.';
}

if (empty($nr_documento)) {
    $erros[] = 'O número do documento é obrigatório.';
} elseif (!is_numeric($nr_documento) || $nr_documento <= 0) {
    $erros[] = 'O número do documento deve ser um número válido.';
}

// Se houver erros, mostrar mensagem
if (!empty($erros)) {
    $sucesso = false;
    $mensagem = "Erros de validação: " . implode(" ", $erros);
} else {
    $conexao = conectarBD();

    $sql = "INSERT INTO Candidaturas (nome, data_nascimento, documento, nr_documento, escolaridade, estabelecimento, situacao) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    if (!$stmt) {
        die("Erro ao preparar a query: " . mysqli_error($conexao));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssisss",
        $nome,
        $data_nascimento,
        $documento,
        $nr_documento,
        $escolaridade,
        $estabelecimento,
        $situacao
    );

    if (mysqli_stmt_execute($stmt)) {
        $id_candidatura = mysqli_insert_id($conexao);
        $sucesso = true;
        $mensagem = "Candidatura registada com sucesso! ID: " . $id_candidatura;
    } else {
        $sucesso = false;
        $mensagem = "Erro ao registar candidatura: " . mysqli_error($conexao);
    }

    mysqli_stmt_close($stmt);
    fecharBD($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento - ESAB</title>
</head>
<body>
    <h1>Processamento da Candidatura</h1>
    
    <?php if ($sucesso): ?>
        <p style="color: green;"><?php echo htmlspecialchars($mensagem); ?></p>
    <?php else: ?>
        <p style="color: red;"><?php echo htmlspecialchars($mensagem); ?></p>
    <?php endif; ?>
    
    <p>
        <a href="index.php">Nova candidatura</a> | 
        <a href="listar.php">Ver todas as candidaturas</a>
    </p>
</body>
</html>

