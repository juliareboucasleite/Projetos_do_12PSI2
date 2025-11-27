<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dados Recebidos</title>
</head>
<body>
    <h2>Informações Recebidas</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $interesse = $_POST["interesse"] ?? "Não selecionado";
        $nivel = $_POST["nivel"] ?? "Não selecionado";
        $observacoes = $_POST["observacoes"] ?? "Nenhuma observação adicionada.";

        echo "<p><b>Nome:</b> $nome</p>";
        echo "<p><b>Email:</b> $email</p>";
        echo "<p><b>Telefone:</b> $telefone</p>";
        echo "<p><b>Interesse:</b> $interesse</p>";
        echo "<p><b>Nível:</b> $nivel</p>";
        echo "<p><b>Observações:</b> $observacoes</p>";
    }
    ?>
</body>
</html>
