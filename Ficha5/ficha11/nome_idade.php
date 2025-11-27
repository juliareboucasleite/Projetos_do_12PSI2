<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nome e Idade</title>
</head>
<body>
    <h2>Inserir Nome e Idade (3 pessoas)</h2>
    <form method="post">
        <?php
        for ($i = 1; $i <= 3; $i++) {
            echo "<p><b>Pessoa $i</b><br>";
            echo "Nome: <input type='text' name='nome$i' required><br>";
            echo "Idade: <input type='number' name='idade$i' required></p>";
        }
        ?>
        <input type="submit" value="Mostrar">
    </form>
    <?php
    function mostrarPessoa($nome, $idade) {
        echo "<p>$nome tem $idade anos.</p>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        for ($i = 1; $i <= 3; $i++) {
            $nome = $_POST["nome$i"];
            $idade = $_POST["idade$i"];
            mostrarPessoa($nome, $idade);
        }
    }
    ?>
</body>
</html>
