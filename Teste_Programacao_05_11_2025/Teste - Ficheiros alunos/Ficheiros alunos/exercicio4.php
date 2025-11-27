<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=teste_utilizadores;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->query('SELECT * FROM utilizadores');
        $utilizadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Ocorreu o seguinte erro: " . $e->getMessage() . "<br>";
        $utilizadores = [];
    } finally {
        if (isset($db)) $db = null;
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4 - Teste</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	    
</head>

<body>
    <h1>Teste: Exercício 4</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ativo</th>
            <th>Tipo</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($utilizadores)): ?>
            <?php foreach ($utilizadores as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td>
                        <?php if ($user['ativo']): ?> <span class="fw-bold text-success">Sim</span>
                        <?php else: ?><span class="fw-bold text-danger">Não</span><?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($user['tipo']); ?></td>
                    <td><?php echo htmlspecialchars($user['nome']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Nenhum utilizador encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
    </table>
</body>
</html>