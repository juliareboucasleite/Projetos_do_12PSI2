<?php
    // Ativar a exibição de erros (é útil durante o desenvolvimento mas DEVE SER REMOVIDO em produção)
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Esta variável indica se a validação foi bem sucedida; se algum campo falhar, o valor será false
    $validacao = true;

    // Este array armazena (possíveis) mensagens de erro para cada campo
    $erros = [
                "nome"      => "",
                "email"     => "",
                "nif"       => "",
                "quantia"   => ""
    ];

    // Este array armazena os dados higienizados
    $dados = [
                "nome"      => "",
                "email"     => "",
                "nif"       => "",
                "quantia"   => 0
    ];

    // Verificar que os dados foram enviados por POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Verificar que o nome existe
        if (!empty($_POST['nome'])) {
            // Higienizar o campo 'nome'
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

            // Verificar o comprimento máximo
            if (!(strlen($nome) <= 100)) {
                $validacao = false;
                $erros['nome'] = "Excedeu o número máximo de caracteres (máximo 100)";
            } else {
                // Atribuir o valor higienizado
                $dados["nome"] = $nome;
            }
        } else {
            $validacao = false;
            $erros['nome'] = "Não preenchido";
        }

        // Verificar que o email existe (é campo opcional)
        if (!empty($_POST['email'])) {
            // Higienizar o campo 'email'
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            // Validar o email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validacao = false;
                $erros['email'] = "Email inválido";
            } else {
                // Verificar o comprimento máximo
                if (!(strlen($email) <= 80)) {
                    $validacao = false;
                    $erros['email'] = "Excedeu o número máximo de caracteres (máximo 80)";
                } else {
                    // Atribuir o valor higienizado
                    $dados["email"] = $email;
                }
            }
        } else {
            $validacao = false;
            $erros['email'] = "Não preenchido";
        }

        // Verificar que o NIF existe (é campo opcional)
        if (!empty($_POST['nif'])) {
            // Validar o campo 'nif'
            $nif = filter_input(INPUT_POST, 'nif', FILTER_VALIDATE_INT);

            // Verificar se o valor é válido
            if ($nif === false) {
                $validacao = false;
                $erros['nif'] = "NIF inválido (deve conter apenas dígitos)";
            } else {
                // Higienizar o campo 'nif'
                $nif = filter_input(INPUT_POST, 'nif', FILTER_SANITIZE_NUMBER_INT);

                // Verificar o comprimento (deve ter exatamente 9 dígitos)
                if (!(strlen($nif) == 9)) {
                    $validacao = false;
                    $erros['nif'] = "NIF inválido (deve ter 9 dígitos)";
                } else {
                    // Atribuir o valor higienizado
                    $dados["nif"] = $nif;
                }
            }
        } else {
            $validacao = false;
            $erros['nif'] = "Não preenchido";
        }

        // Verificar que a quantia existe (é campo opcional)
        if (!empty($_POST['quantia'])) {
            // Validar o campo 'quantia'

            // Definir as opções para o filtro de validação: valores mínimo e máximo
            $opcoes = [
                "options" => [ "min_range" => 0.00, "max_range" => 9999.99 ],
                "flags" => FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND
            ];

            $quantia = filter_input(INPUT_POST, 'quantia', FILTER_VALIDATE_FLOAT, $opcoes);

            // Verificar se o valor é válido
            if ($quantia === false) {
                $validacao = false;
                $erros['quantia'] = "Quantia inválida (deverá ser número entre 0 e 9999.99)";
            } else {
                // Higienizar o campo 'quantia'
                $quantia = filter_input(INPUT_POST, 'quantia', FILTER_SANITIZE_NUMBER_FLOAT, $opcoes);

                // Atribuir o valor higienizado
                $dados["quantia"] = (float)$quantia;
            }
        } else {
            $validacao = false;
            $erros['quantia'] = "Não preenchido";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar dados</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <main class="container mt-4 mb-4">
        <h1>Validar dados</h1>

        <p>Dados recebidos:</p>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Campo</th>
                        <th>Valor higienizado</th>
                        <th>Mensagem de erro</th>
                        <th>Valor original</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($dados as $campo => $valor) {
                        $valorHigienizado = htmlspecialchars((string)$valor);
                        $mensagemErro = htmlspecialchars((string)$erros[$campo]);
                        $valorOriginal = isset($_POST[$campo]) ? htmlspecialchars((string)$_POST[$campo]) : '';
                        echo "<tr><td>{$campo}</td><td>{$valorHigienizado}</td><td>{$mensagemErro}</td><td>{$valorOriginal}</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>

        <p class="mt-3">
            <a href="index.php">Voltar ao formulário</a>
        </p>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>