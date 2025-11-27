<?php
$login = $_POST['login'];
$senha = $_POST['senha'];

// Criptografia: A=0, E=1, I=2, O=3, U=4, a=5, e=6, i=7, o=8, u=9
$senha_criptografada = str_replace(
    array('A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u'),
    array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),
    $senha
);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Resultado da Criptografia</title>
</head>
<body>
    <h1>Resultado da Criptografia:</h1>
    <p>Login: <?php echo $login; ?></p>
    <p>Senha Original: <?php echo $senha; ?></p>
    <p>Senha Criptografada: <?php echo $senha_criptografada; ?></p>
    <p><a href="ex4.php">Voltar</a></p>
</body>
</html>
