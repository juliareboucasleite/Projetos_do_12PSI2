<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h3>Login</h3>
    <form method="post">
        Usuário: <input type="text" name="user"><br>
        Palavra-chave: <input type="password" name="senha"><br><br>
        <input type="submit" value="Entrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function validarLogin($user, $senha) {
            $userCorreto = "admin";
            $senhaCorreta = "12345";

            if ($user === $userCorreto && $senha === $senhaCorreta) {
                return true;
            } else {
                return false;
            }
        }

        $user = $_POST['user'];
        $senha = $_POST['senha'];

        if (validarLogin($user, $senha)) {
            echo "<br><b>Login bem-sucedido!</b>";
        } else {
            echo "<br><b>Usuário ou senha incorretos. Tente novamente.</b>";
        }
    }
    ?>
</body>
</html>
