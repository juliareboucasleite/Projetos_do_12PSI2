<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
    <style>
        .obrigatorio {
            color: red;
        }
    </style>
</head>
<body>    
    <h1>Exercício 4 - Formulário</h1>

    <form action="exercicio4-validar.php" method="post">
        <label for="nome">Nome<span class="obrigatorio">*</span>:</label>
        <input id="nome" name="nome" type="text" maxlength="100" required>

        <button type="submit">Submeter</button> 

        <p><small><span class="obrigatorio">*</span> Campo obrigatório</small></p>
    </form>
</body>
</html>