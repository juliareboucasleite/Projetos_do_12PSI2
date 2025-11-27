<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Exercício 3 - Formulário com Validação</title>
</head>
<body>
    <h1>Exercício 3 - Formulário com Validação</h1>
    
    <form action="dados.php" method="post">
        <p>Nome: <input type="text" name="nome" required></p>
        <p>Idade: <input type="number" name="idade" min="0" max="100" required></p>
        <p>Mensagem: <textarea name="mensagem" required></textarea></p>
        <p>Assunto: <input type="text" name="assunto" required></p>
        <p><input type="submit" value="Enviar"></p>
    </form>
    
    <p><a href="index.php">Voltar</a></p>
</body>
</html>
