<?php
require_once 'config.php';
$nome = '';
$data_nascimento = '';
$documento = '';
$nr_documento = '';
$escolaridade = '';
$estabelecimento = '';
$situacao = '';

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $data_nascimento = isset($_POST['data_nascimento']) ? trim($_POST['data_nascimento']) : '';
    $documento = isset($_POST['documento']) ? trim($_POST['documento']) : '';
    $nr_documento = isset($_POST['nr_documento']) ? trim($_POST['nr_documento']) : '';
    $escolaridade = isset($_POST['escolaridade']) ? trim($_POST['escolaridade']) : '';
    $estabelecimento = isset($_POST['estabelecimento']) ? trim($_POST['estabelecimento']) : '';
    $situacao = isset($_POST['situacao']) ? trim($_POST['situacao']) : '';
    
    if (empty($nome)) {
        $erros['nome'] = 'O nome é obrigatório.';
    } elseif (strlen($nome) < 2) {
        $erros['nome'] = 'O nome deve ter pelo menos 2 caracteres.';
    }
    
    if (empty($data_nascimento)) {
        $erros['data_nascimento'] = 'A data de nascimento é obrigatória.';
    } else {
        $data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
        if (!$data || $data->format('Y-m-d') !== $data_nascimento) {
            $erros['data_nascimento'] = 'A data de nascimento deve estar no formato válido (AAAA-MM-DD).';
        } else {
            $hoje = new DateTime();
            if ($data > $hoje) {
                $erros['data_nascimento'] = 'A data de nascimento não pode ser futura.';
            }
        }
    }
    
    // Validar Documento de Identificação (obrigatório)
    if (empty($documento)) {
        $erros['documento'] = 'O documento de identificação é obrigatório.';
    } elseif (!in_array($documento, ['Bilhete de Identidade', 'CC', 'Passaporte'])) {
        $erros['documento'] = 'Tipo de documento inválido.';
    }
    
    // Validar Número do Documento (obrigatório)
    if (empty($nr_documento)) {
        $erros['nr_documento'] = 'O número do documento é obrigatório.';
    } elseif (!is_numeric($nr_documento) || $nr_documento <= 0) {
        $erros['nr_documento'] = 'O número do documento deve ser um número válido.';
    }
    
    // Validar campos opcionais (se preenchidos)
    if (!empty($escolaridade) && !in_array($escolaridade, ['12ºAno', 'Licenciatura', 'Mestrado', 'Doutoramento'])) {
        $erros['escolaridade'] = 'Nível de escolaridade inválido.';
    }
    
    if (!empty($estabelecimento) && strlen($estabelecimento) > 60) {
        $erros['estabelecimento'] = 'O nome do estabelecimento não pode exceder 60 caracteres.';
    }
    
    if (!empty($situacao) && !in_array($situacao, ['Sem experiência', 'Inferior a 5 anos', '+ de 5 anos'])) {
        $erros['situacao'] = 'Situação profissional inválida.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESAB - Candidatura Espontânea</title>
</head>
<body>
    <h1>ESAB - Candidatura Espontânea</h1>
    
    <?php if (!empty($erros)): ?>
        <p><strong>Por favor, corrija os seguintes erros:</strong></p>
        <ul>
            <?php foreach ($erros as $erro): ?>
                <li><?php echo htmlspecialchars($erro); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
        
        <form method="POST" action="processar.php" novalidate>
            <fieldset>
                <legend>Dados pessoais</legend>
                
                <p>
                    <label for="nome">Nome*:</label><br>
                    <input 
                        type="text" 
                        id="nome" 
                        name="nome" 
                        value="<?php echo htmlspecialchars($nome); ?>"
                        required
                    >
                    <?php if (isset($erros['nome'])): ?>
                        <br><span style="color: red;"><?php echo htmlspecialchars($erros['nome']); ?></span>
                    <?php endif; ?>
                </p>
                
                <p>
                    <label for="data_nascimento">Data de Nascimento*:</label><br>
                    <input 
                        type="date" 
                        id="data_nascimento" 
                        name="data_nascimento" 
                        value="<?php echo htmlspecialchars($data_nascimento); ?>"
                        required
                    >
                    <?php if (isset($erros['data_nascimento'])): ?>
                        <br><span style="color: red;"><?php echo htmlspecialchars($erros['data_nascimento']); ?></span>
                    <?php endif; ?>
                </p>
                
                <p>
                    <label for="documento">Doc. de Identificação*:</label>
                    <select 
                        id="documento" 
                        name="documento" 
                        required
                    >
                        <option value="">Selecione...</option>
                        <option value="Bilhete de Identidade" <?php echo $documento === 'Bilhete de Identidade' ? 'selected' : ''; ?>>Bilhete de Identidade</option>
                        <option value="CC" <?php echo $documento === 'CC' ? 'selected' : ''; ?>>CC</option>
                        <option value="Passaporte" <?php echo $documento === 'Passaporte' ? 'selected' : ''; ?>>Passaporte</option>
                    </select>
                    <input 
                        type="number" 
                        id="nr_documento" 
                        name="nr_documento" 
                        value="<?php echo htmlspecialchars($nr_documento); ?>"
                        required
                        min="1"
                        placeholder="Número"
                    >
                    <?php if (isset($erros['documento'])): ?>
                        <br><span style="color: red;"><?php echo htmlspecialchars($erros['documento']); ?></span>
                    <?php endif; ?>
                    <?php if (isset($erros['nr_documento'])): ?>
                        <br><span style="color: red;"><?php echo htmlspecialchars($erros['nr_documento']); ?></span>
                    <?php endif; ?>
                </p>
            </fieldset>
            
            <fieldset>
                <legend>Habilitações académicas</legend>
                
                <p>
                    <label for="escolaridade">Escolaridade:</label>
                    <select 
                        id="escolaridade" 
                        name="escolaridade"
                    >
                        <option value="">Selecione...</option>
                        <option value="12ºAno" <?php echo $escolaridade === '12ºAno' ? 'selected' : ''; ?>>12ºAno</option>
                        <option value="Licenciatura" <?php echo $escolaridade === 'Licenciatura' ? 'selected' : ''; ?>>Licenciatura</option>
                        <option value="Mestrado" <?php echo $escolaridade === 'Mestrado' ? 'selected' : ''; ?>>Mestrado</option>
                        <option value="Doutoramento" <?php echo $escolaridade === 'Doutoramento' ? 'selected' : ''; ?>>Doutoramento</option>
                    </select>
                    <label for="estabelecimento">Estabelecimento de Ensino:</label>
                    <input 
                        type="text" 
                        id="estabelecimento" 
                        name="estabelecimento" 
                        value="<?php echo htmlspecialchars($estabelecimento); ?>"
                        maxlength="60"
                    >
                    <?php if (isset($erros['escolaridade'])): ?>
                        <br><span style="color: red;"><?php echo htmlspecialchars($erros['escolaridade']); ?></span>
                    <?php endif; ?>
                    <?php if (isset($erros['estabelecimento'])): ?>
                        <br><span style="color: red;"><?php echo htmlspecialchars($erros['estabelecimento']); ?></span>
                    <?php endif; ?>
                </p>
            </fieldset>
            
            <fieldset>
                <legend>Experiência profissional</legend>
                
                <p>
                    <label>Situação profissional:</label><br>
                    <input 
                        type="radio" 
                        name="situacao" 
                        value="Sem experiência"
                        <?php echo $situacao === 'Sem experiência' ? 'checked' : ''; ?>
                    >
                    Sem experiência
                    <input 
                        type="radio" 
                        name="situacao" 
                        value="Inferior a 5 anos"
                        <?php echo $situacao === 'Inferior a 5 anos' ? 'checked' : ''; ?>
                    >
                    Inferior a 5 anos
                    <input 
                        type="radio" 
                        name="situacao" 
                        value="+ de 5 anos"
                        <?php echo $situacao === '+ de 5 anos' ? 'checked' : ''; ?>
                    >
                    + de 5 anos
                    <?php if (isset($erros['situacao'])): ?>
                        <br><span style="color: red;"><?php echo htmlspecialchars($erros['situacao']); ?></span>
                    <?php endif; ?>
                </p>
            </fieldset>
            
            <p>* campos obrigatórios</p>
            
            <p>
                <button type="submit" name="submeter">Submeter candidatura</button>
                <a href="listar.php">Ver todas as candidaturas</a>
            </p>
        </form>
</body>
</html>

