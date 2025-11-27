<?php
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$mensagem = $_POST['mensagem'];
$assunto = $_POST['assunto'];

// Validação
if (empty($nome) || empty($idade) || empty($mensagem) || empty($assunto)) {
    echo "<h1>Erro!</h1>";
    echo "<p>Todos os campos devem estar preenchidos.</p>";
    echo "<p><a href='ex3.php'>Voltar</a></p>";
} elseif ($idade < 0 || $idade > 100) {
    echo "<h1>Erro!</h1>";
    echo "<p>A idade deve estar entre 0 e 100.</p>";
    echo "<p><a href='ex3.php'>Voltar</a></p>";
} else {
    echo "<h1>Dados Recebidos:</h1>";
    echo "<p>Nome: $nome</p>";
    echo "<p>Idade: $idade</p>";
    echo "<p>Mensagem: $mensagem</p>";
    echo "<p>Assunto: $assunto</p>";
    echo "<p><a href='ex3.php'>Voltar</a></p>";
}
?>
