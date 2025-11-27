<?php
    // Esta variável indica se a validação foi bem sucedida; se algum campo falhar, o valor será false
    $validacao = true;

    // Este array armazena (possíveis) mensagens de erro para cada campo
    $erros = [
                "username"  => "",
                "idade"     => "",
                "password"  => "",
                "password2" => ""
    ];

    // Este array armazena os dados higienizados
    $dados = [
                "username"  => "",
                "idade"     => 0,
                "password"  => "",
                "password2" => ""
    ];

    // Verificar que os dados foram enviados por POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Verificar que o username existe
        if (!empty($_POST['username'])) {
            // Higienizar o campo 'username'
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);

            // Verificar o comprimento máximo
            if (strlen($username) > 20) {
                $validacao = false;
                $erros['username'] = "Excedeu o número máximo de caracteres (máximo 20)";
            } else {
                // Atribuir o valor higienizado
                $dados["username"] = $username;
            }
        } else {
            $validacao = false;
            $erros['username'] = "Não preenchido";
        }

        // Verificar que a idade existe
        if (!empty($_POST['idade'])) {
            // Validar o campo 'idade'
            $idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT);

            // Verificar se o valor é válido
            if ($idade === false) {
                $validacao = false;
                $erros['idade'] = "Idade inválida (deve conter apenas dígitos)";
            } else {
                // Verificar o comprimento máximo
                if (strlen($_POST['idade']) > 3) {
                    $validacao = false;
                    $erros['idade'] = "Excedeu o número máximo de caracteres (máximo 3)";
                } else {
                    // Verificar se a idade é maior que zero
                    if ($idade <= 0) {
                        $validacao = false;
                        $erros['idade'] = "Idade inválida (deve ser maior que zero)";
                    } else {
                        // Atribuir o valor higienizado
                        $dados["idade"] = $idade;
                    }
                }
            }
        } else {
            $validacao = false;
            $erros['idade'] = "Não preenchido";
        }

        // Verificar que a password existe
        if (!empty($_POST['password'])) {
            // Verificar o comprimento máximo
            if (strlen($_POST['password']) > 100) {
                $validacao = false;
                $erros['password'] = "Excedeu o número máximo de caracteres (máximo 100)";
            } else {
                // Atribuir o valor (não sanitizamos passwords)
                $dados["password"] = $_POST['password'];
            }
        } else {
            $validacao = false;
            $erros['password'] = "Não preenchido";
        }

        // Verificar que a password2 existe
        if (!empty($_POST['password2'])) {
            // Verificar o comprimento máximo
            if (strlen($_POST['password2']) > 100) {
                $validacao = false;
                $erros['password2'] = "Excedeu o número máximo de caracteres (máximo 100)";
            } else {
                // Atribuir o valor (não sanitizamos passwords)
                $dados["password2"] = $_POST['password2'];
            }
        } else {
            $validacao = false;
            $erros['password2'] = "Não preenchido";
        }

        // Verificar se as passwords coincidem (apenas se ambas foram preenchidas)
        if (!empty($dados['password']) && !empty($dados['password2'])) {
            if ($dados['password'] !== $dados['password2']) {
                $validacao = false;
                $erros['password2'] = "As passwords não coincidem";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2 - Teste</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">	    
</head>
<body>    
    <h1>Teste: Exercício 2</h1>
    <p class="fw-bold">Julia Reboucas Leite - Nº10</p>
    <h2 class="h4 mb-4">Dados recebidos</h2>

    <p>Dados recebidos:</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor higienizado</th>
                <th>Mensagem de erro</th>
                <th>Valor original</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dados as $campo => $valor) { ?>
            <tr>
                <td><?= $campo ?></td>
                <td><?= htmlspecialchars($valor) ?></td>
                <td class="<?= !empty($erros[$campo]) ? 'text-danger' : '' ?>"><?= $erros[$campo] ?></td>
                <td><?= isset($_POST[$campo]) ? htmlspecialchars($_POST[$campo]) : '' ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php if ($validacao): ?>
        <div class="text-success fw-bold mb-3">Validação efetuada com sucesso.</div>
    <?php else: ?>
        <div class="text-danger fw-bold mb-3">Dados inválidos. Por favor, corrija os erros acima.</div>
    <?php endif; ?>
    <p>
        &leftarrow; <a href="exercicio2-form.php">Voltar ao formulário</a>
    </p>
</body>
</html>