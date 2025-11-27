<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resultado</title>
</head>
<body>
    <h3 align="center">Dados Preenchidos no Formulário</h3>
    Usuário: <?php echo $_POST['nome']; ?><br>

    Leu o tutorial:
    <?php
        if (isset($_POST['leu'])) { 
            echo "Sim, leu!";
        } else {
            echo "Não leu.";
        }
    ?>
    <br>

    Nota: <?php echo $_POST['nota']; ?>
</body>
</html>
